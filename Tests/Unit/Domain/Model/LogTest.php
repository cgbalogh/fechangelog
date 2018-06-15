<?php

namespace CGB\Fechangelog\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \CGB\Fechangelog\Domain\Model\Log.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class LogTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \CGB\Fechangelog\Domain\Model\Log
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \CGB\Fechangelog\Domain\Model\Log();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTableNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTableName()
		);
	}

	/**
	 * @test
	 */
	public function setTableNameForStringSetsTableName()
	{
		$this->subject->setTableName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'tableName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRecordUidReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setRecordUidForIntSetsRecordUid()
	{	}

	/**
	 * @test
	 */
	public function getFieldNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFieldName()
		);
	}

	/**
	 * @test
	 */
	public function setFieldNameForStringSetsFieldName()
	{
		$this->subject->setFieldName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fieldName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFieldTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFieldType()
		);
	}

	/**
	 * @test
	 */
	public function setFieldTypeForStringSetsFieldType()
	{
		$this->subject->setFieldType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fieldType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getActionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAction()
		);
	}

	/**
	 * @test
	 */
	public function setActionForStringSetsAction()
	{
		$this->subject->setAction('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'action',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOldStringReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getOldString()
		);
	}

	/**
	 * @test
	 */
	public function setOldStringForStringSetsOldString()
	{
		$this->subject->setOldString('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'oldString',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNewStringReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNewString()
		);
	}

	/**
	 * @test
	 */
	public function setNewStringForStringSetsNewString()
	{
		$this->subject->setNewString('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'newString',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOldTextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getOldText()
		);
	}

	/**
	 * @test
	 */
	public function setOldTextForStringSetsOldText()
	{
		$this->subject->setOldText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'oldText',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNewTextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNewText()
		);
	}

	/**
	 * @test
	 */
	public function setNewTextForStringSetsNewText()
	{
		$this->subject->setNewText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'newText',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForFrontendUser()
	{	}

	/**
	 * @test
	 */
	public function setFeuserForFrontendUserSetsFeuser()
	{	}
}
