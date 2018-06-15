<?php
namespace CGB\Fechangelog\Domain\Model;


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
 * Log
 */
class Log extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    
    /**
	 * 
	 */
	const ACTION_ADD = 1;
	const ACTION_UPDATE = 2;
	const ACTION_REMOVE = 3;

    /**
     * tableName
     *
     * @var string
     */
    protected $tableName = '';
    
    /**
     * recordUid
     *
     * @var int
     */
    protected $recordUid = 0;
    
    /**
     * fieldName
     *
     * @var string
     */
    protected $fieldName = '';
    
    /**
     * fieldType
     *
     * @var string
     */
    protected $fieldType = '';
    
    /**
     * action
     *
     * @var string
     */
    protected $action = '';
    
    /**
     * oldString
     *
     * @var string
     */
    protected $oldString = '';
    
    /**
     * newString
     *
     * @var string
     */
    protected $newString = '';
    
    /**
     * oldText
     *
     * @var string
     */
    protected $oldText = '';
    
    /**
     * newText
     *
     * @var string
     */
    protected $newText = '';
    
    /**
     * feuser
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $feuser = null;
    
    /**
     * Returns the tableName
     *
     * @return string $tableName
     */
    public function getTableName()
    {
        return $this->tableName;
    }
    
    /**
     * Sets the tableName
     *
     * @param string $tableName
     * @return void
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }
    
    /**
     * Returns the recordUid
     *
     * @return int $recordUid
     */
    public function getRecordUid()
    {
        return $this->recordUid;
    }
    
    /**
     * Sets the recordUid
     *
     * @param int $recordUid
     * @return void
     */
    public function setRecordUid($recordUid)
    {
        $this->recordUid = $recordUid;
    }
    
    /**
     * Returns the fieldName
     *
     * @return string $fieldName
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }
    
    /**
     * Sets the fieldName
     *
     * @param string $fieldName
     * @return void
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    }
    
    /**
     * Returns the fieldType
     *
     * @return string $fieldType
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }
    
    /**
     * Sets the fieldType
     *
     * @param string $fieldType
     * @return void
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;
    }
    
    /**
     * Returns the action
     *
     * @return string $action
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * Sets the action
     *
     * @param string $action
     * @return void
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    /**
     * Returns the oldString
     *
     * @return string $oldString
     */
    public function getOldString()
    {
        return $this->oldString;
    }
    
    /**
     * Sets the oldString
     *
     * @param string $oldString
     * @return void
     */
    public function setOldString($oldString)
    {
        $this->oldString = $oldString;
    }
    
    /**
     * Returns the newString
     *
     * @return string $newString
     */
    public function getNewString()
    {
        return $this->newString;
    }
    
    /**
     * Sets the newString
     *
     * @param string $newString
     * @return void
     */
    public function setNewString($newString)
    {
        $this->newString = $newString;
    }
    
    /**
     * Returns the oldText
     *
     * @return string $oldText
     */
    public function getOldText()
    {
        return $this->oldText;
    }
    
    /**
     * Sets the oldText
     *
     * @param string $oldText
     * @return void
     */
    public function setOldText($oldText)
    {
        $this->oldText = $oldText;
    }
    
    /**
     * Returns the newText
     *
     * @return string $newText
     */
    public function getNewText()
    {
        return $this->newText;
    }
    
    /**
     * Sets the newText
     *
     * @param string $newText
     * @return void
     */
    public function setNewText($newText)
    {
        $this->newText = $newText;
    }
    
    /**
     * Returns the feuser
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
     */
    public function getFeuser()
    {
        return $this->feuser;
    }
    
    /**
     * Sets the feuser
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
     * @return void
     */
    public function setFeuser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser)
    {
        $this->feuser = $feuser;
    }

}