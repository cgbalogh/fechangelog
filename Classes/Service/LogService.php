<?php
namespace CGB\Fechangelog\Service;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Various helper routines
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class LogService implements \TYPO3\CMS\Core\SingletonInterface {

    /**
     *
     * @var string $class 
     */
    protected $class;
    
    /**
     *
     * @var type 
     */
    protected $persistenceManager;
    
	function __construct() {
		// create an instance of persistence manager in order to be able to persist changes
        $this->persistenceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
	}
	
	/**
	 *
	 * @param object $object
	 */
	function logUpdate( $object ) {
		$uid = $object->getUid();
		if (is_null($uid) || ($uid == 0)) {
            return false;
        }
        
        $logAs = $this->logAs( $object );
            
        // it is assumed that non-settable properties cannot be changed in frontend!
        $properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getSettablePropertyNames($object);
            
        foreach ($properties as $propertyName) {
            // if property has not changed continue with next
            if (!$object->_isDirty($propertyName)) {
                continue;
            }

            // check if property is tagged with "dontlog" and skip if so
            $reflection = new \TYPO3\CMS\Extbase\Reflection\PropertyReflection($this->class, $propertyName);
            if ($reflection->isTaggedWith('dontlog')) {
                continue;
            }

            $oldValue = $object->_getCleanProperty( $propertyName );
            $newValue = $object->_getProperty($propertyName);
            $this->log($logAs, $propertyName, $uid, \CGB\Fechangelog\Domain\Model\Log::ACTION_UPDATE, $newValue, $oldValue);
		}
	}

	/**
	 *
	 * @param object $object
	 * @param boolean $persist 
	 */
	function logAdd($object, $persist = true) {
		if ($persist) {
            $this->persistenceManager->persistAll();
        }
		 
		$uid = $object->getUid();
		if (is_null($uid) || ($uid == 0)) {
            return false;
        }
        
        $logAs = $this->logAs( $object );
            
        // log creation
        $this->log($logAs, '[created]', $object->getUid(), \CGB\Fechangelog\Domain\Model\Log::ACTION_ADD, $object->getUid(), 0);
        
        // it is assumed that non-settable properties cannot be changed in frontend!
        $properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getSettablePropertyNames($object);
            
        foreach ($properties as $propertyName) {
            // check if property is tagged with "dontlog" and skip if so
            $reflection = new \TYPO3\CMS\Extbase\Reflection\PropertyReflection($this->class, $propertyName);
            if ($reflection->isTaggedWith('dontlog')) {
                continue;
            }

            $newValue = $object->_getProperty($propertyName);
            $this->log($logAs, $propertyName, $uid, \CGB\Fechangelog\Domain\Model\Log::ACTION_ADD, $newValue);
		}
		if ($persist) {
            $this->persistenceManager->persistAll(); 
        }
	}	
    
	/**
	 *
	 * @param object $object
	 */
	function logRemove($object) {
		$uid = $object->getUid();
		if (is_null($uid) || ($uid == 0)) {
            return false;
        }
        
        $logAs = $this->logAs( $object );
            
        // it is assumed that non-settable properties cannot be changed in frontend!
        $properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getSettablePropertyNames($object);
        
		$uid = $object->getUid();
        $propertyName = '[deleted]';
        $this->log($logAs, $propertyName, $uid, \CGB\Fechangelog\Domain\Model\Log::ACTION_REMOVE, 0, $uid);
	}
    
	/**
	 * log
     * 
     * Logs the changes made in FE to database table
     * 
     * 
	 * @param string $table The object class
	 * @param string $field
	 * @param int $uid
	 * @param int $action
	 * @param mixed $new
	 * @param mixed $old
	 * @return type 
	 */
	function log($table, $field, $uid, $action, $new, $old = '') {
		// log new values depending on type of value
		// echo "$table, $field, $type, $uid, $action, <br />";
        if ($new) {
    		$type = gettype($new);
        } elseif ($old) {
            $type = gettype($new); 
        } else {
            $type = '';
        }

        if (($type == 'object') && ((get_class($new) == 'DateTime') || (get_class($new) == 'DateTime'))) {
            $type = 'DateTime';
        }
        
        switch ($type) {
            case '':
                return;
            
			case 'NULL':
				return;
			
			case 'boolean':
				if (intval($old) === intval($new)) {
                    return;
                }
                break;

            case 'double':
				if (doubleval($old) === doubleval($new)) {
                    return;
                }
                break;

			case 'integer':
				if (intval($old) === intval($new)) {
                    return;
                }
                break;

			case 'string': 	
				if ($old === $new) {
                    return;
                }
                break;
		
			case 'array': 	
				break;

			case 'object':
                self::load($new);
                self::load($old);
                $objectClass = get_class($new);

                switch($objectClass) {
                    case 'TYPO3\\CMS\\Extbase\\Persistence\\Generic\\LazyObjectStorage':
                    case 'TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage':
                        $old = self::getUidList($old);
                        $new = self::getUidList($new);
                        if ($old == $new) {
                            return;
                        }
                        $type .= ':' . $class;
                        break;
                    default:
                        ;
                }
                break;
            
            case 'DateTime':
                if (($old instanceof DateTime) && ($new instanceof DateTime) && ($old->getTimestamp() === $new->getTimestamp())) {
                    return;
                }
                if ($old instanceof \DateTime) {
                    $old = $old->format(\DateTime::W3C);
                }

                if ($new instanceof \DateTime) {
                    $new = $new->format(\DateTime::W3C);
                }
                break;
					
            default:
                break;	

        }

		// check again if $new != $old
		if ($new == $old) {
            return;
        }

        $insertArray = array(
            'table_name' => $table,
            'record_uid' => $uid,
            'field_name' => $field,
            'field_type' => $type,
            'action' => $action,
            'feuser' => $GLOBALS['TSFE']->fe_user->user['uid'],
            'crdate' => time(),
            'tstamp' => time(),
        );

        if (is_null($old)) {
            $old = '';
        }
        
		if ( max(strlen($new), strlen($old)) > 250) {
            $insertArray['new_text'] = $new;
            $insertArray['old_text'] = $old;
            $insertArray['field_type'] = 'text';
		} else {
            $insertArray['new_string'] = $new;
            $insertArray['old_string'] = $old;
		} 

        $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_fechangelog_domain_model_log', $insertArray);
	}
    
	/**
	 *
	 * @param string $message 
	 */
	public function logToFile ( $message = '' ) {
		$fp = fopen ('fechangelog.txt', 'a+');
		
		fwrite($fp, date("Y-m-d H:i:s") . ' ' . $message . "\n" );
		fclose($fp);
	}
	
 
    /**
     * function logAs
     * sets the $class variable and check for logas annotation
     * 
     * @param object $object
     */
    private function logAs ( $object ) {
        // get class name and derive table name (actually only object suffix)
        $this->class = get_class($object);
        $classReflection = new \TYPO3\CMS\Extbase\Reflection\ClassReflection($this->class);
            
        if ($classReflection->isTaggedWith('logas')) {
            $mapToObject = $classReflection->getTagValues('logas');
            return $mapToObject[0];
        } else {
            
            $fqcArray = \array_map('strtolower', \explode('\\', $this->class));
            array_shift($fqcArray);
            return 'tx_' . implode('_', $fqcArray);
        }
    }
    
    /**
     * 
     * @param mixed $object
     */
    static function load(&$object) {
        if ($object instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $object = $object->_loadRealInstance();
        }
    }

    /**
     * 
     * @param mixed $objectStorage
     */
    static function getUidList($objectStorage) {
        // collect list of existing IDs in object storage
        $uidList = [];
        if (is_object($objectStorage)) {
            foreach ($objectStorage as $object) {
                self::load($object);
                if (method_exists($object, 'getUid')) {
                    $uidList[] = $object->getUid();
                }
            }
        }
        asort($uidList);
        return implode(',', $uidList);
    }
    
}