<?php
namespace CGB\Fechangelog\Persistence;

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
 * Repository
 */
class Repository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
    /**
     * logService
     *
     * @var \CGB\Fechangelog\Service\LogService
     * @inject
     */
    protected $logService = NULL;
    
	/**
	 * remove
	 * 
	 * @return void
	 * @param $object
	 */
	public function remove($object) {
		// logService must be called *before* updating in order to see the record
		// t3lib_div::makeInstance('Tx_FeChangelog_Service_LogService')->logRemove($object, $this);
        $this->logService->logRemove($object);
		parent::remove($object);
	}
	
	
	/**
	 * add
	 *
	 * @return void
	 * @param $object
	 */
	public function add($object) {
		// logService must be called *after* adding in order to get persisted uid and pid
		parent::add($object);
        $this->logService->logAdd($object);
	}
    
	/**
	 * update
	 *
	 * @return void
	 * @param $object
	 */
	public function update($object) {
		// logService must be called *before* updating in order to see the differences
        $this->logService->logUpdate($object);
		parent::update($object);
	}	
    
    
}

