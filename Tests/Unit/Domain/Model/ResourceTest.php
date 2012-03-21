<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Noel Bossart <noel.bossart@me.com>, Namics AG
 *  			Beat Gebistorf <beat.gebistorf@namics.com>, Namics AG
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
 * Test case for class Tx_Nxshowroom_Domain_Model_Resource.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Showroom
 *
 * @author Noel Bossart <noel.bossart@me.com>
 * @author Beat Gebistorf <beat.gebistorf@namics.com>
 */
class Tx_Nxshowroom_Domain_Model_ResourceTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Nxshowroom_Domain_Model_Resource
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Nxshowroom_Domain_Model_Resource();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForObjectStorageContainingTx_Nxshowroom_Domain_Model_Image() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingTx_Nxshowroom_Domain_Model_ImageSetsImages() { 
		$image = new Tx_Nxshowroom_Domain_Model_Image();
		$objectStorageHoldingExactlyOneImages = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->fixture->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertSame(
			$objectStorageHoldingExactlyOneImages,
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages() {
		$image = new Tx_Nxshowroom_Domain_Model_Image();
		$objectStorageHoldingExactlyOneImage = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImage->attach($image);
		$this->fixture->addImage($image);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneImage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages() {
		$image = new Tx_Nxshowroom_Domain_Model_Image();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($image);
		$localObjectStorage->detach($image);
		$this->fixture->addImage($image);
		$this->fixture->removeImage($image);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function getResourceReturnsInitialValueForObjectStorageContainingTx_Nxshowroom_Domain_Model_Resource() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getResource()
		);
	}

	/**
	 * @test
	 */
	public function setResourceForObjectStorageContainingTx_Nxshowroom_Domain_Model_ResourceSetsResource() { 
		$resource = new Tx_Nxshowroom_Domain_Model_Resource();
		$objectStorageHoldingExactlyOneResource = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneResource->attach($resource);
		$this->fixture->setResource($objectStorageHoldingExactlyOneResource);

		$this->assertSame(
			$objectStorageHoldingExactlyOneResource,
			$this->fixture->getResource()
		);
	}
	
	/**
	 * @test
	 */
	public function addResourceToObjectStorageHoldingResource() {
		$resource = new Tx_Nxshowroom_Domain_Model_Resource();
		$objectStorageHoldingExactlyOneResource = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneResource->attach($resource);
		$this->fixture->addResource($resource);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneResource,
			$this->fixture->getResource()
		);
	}

	/**
	 * @test
	 */
	public function removeResourceFromObjectStorageHoldingResource() {
		$resource = new Tx_Nxshowroom_Domain_Model_Resource();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($resource);
		$localObjectStorage->detach($resource);
		$this->fixture->addResource($resource);
		$this->fixture->removeResource($resource);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getResource()
		);
	}
	
	/**
	 * @test
	 */
	public function getResTypeReturnsInitialValueForTx_Nxshowroom_Domain_Model_Type() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getResType()
		);
	}

	/**
	 * @test
	 */
	public function setResTypeForTx_Nxshowroom_Domain_Model_TypeSetsResType() { 
		$dummyObject = new Tx_Nxshowroom_Domain_Model_Type();
		$this->fixture->setResType($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getResType()
		);
	}
	
	/**
	 * @test
	 */
	public function getTagsReturnsInitialValueForObjectStorageContainingTx_Nxshowroom_Domain_Model_Tags() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTags()
		);
	}

	/**
	 * @test
	 */
	public function setTagsForObjectStorageContainingTx_Nxshowroom_Domain_Model_TagsSetsTags() { 
		$tag = new Tx_Nxshowroom_Domain_Model_Tags();
		$objectStorageHoldingExactlyOneTags = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTags->attach($tag);
		$this->fixture->setTags($objectStorageHoldingExactlyOneTags);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTags,
			$this->fixture->getTags()
		);
	}
	
	/**
	 * @test
	 */
	public function addTagToObjectStorageHoldingTags() {
		$tag = new Tx_Nxshowroom_Domain_Model_Tags();
		$objectStorageHoldingExactlyOneTag = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTag->attach($tag);
		$this->fixture->addTag($tag);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTag,
			$this->fixture->getTags()
		);
	}

	/**
	 * @test
	 */
	public function removeTagFromObjectStorageHoldingTags() {
		$tag = new Tx_Nxshowroom_Domain_Model_Tags();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($tag);
		$localObjectStorage->detach($tag);
		$this->fixture->addTag($tag);
		$this->fixture->removeTag($tag);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTags()
		);
	}
	
}
?>