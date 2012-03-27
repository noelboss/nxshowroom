<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Noel Bossart <noel.bossart@me.com>, Namics AG
 *  Beat Gebistorf <beat.gebistorf@namics.com>, Namics AG
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
 *
 *
 * @package nxshowroom
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Nxshowroom_Domain_Model_Resource extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Project Title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Description
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $description;

	/**
	 * Images
	 *
	 * @var string
	 */
	protected $images;

	/**
	 * Attachments
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Attachment>
	 */
	protected $attachment;

	/**
	 * Resource Relation
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Resource>
	 */
	protected $resource;

	/**
	 * Type
	 *
	 * @var Tx_Nxshowroom_Domain_Model_Type
	 */
	protected $type;

	/**
	 * Tags
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Tags>
	 */
	protected $tags;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->attachment = new Tx_Extbase_Persistence_ObjectStorage();

		$this->resource = new Tx_Extbase_Persistence_ObjectStorage();

		$this->tags = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the images
	 *
	 * @return string $images
	 */
	public function getImages() {
		return explode(',',$this->images);
	}

	/**
	 * Sets the images
	 *
	 * @param string $images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = $images;
	}

	/**
	 * Adds a Attachment
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Attachment $attachment
	 * @return void
	 */
	public function addAttachment(Tx_Nxshowroom_Domain_Model_Attachment $attachment) {
		$this->attachment->attach($attachment);
	}

	/**
	 * Removes a Attachment
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Attachment $attachmentToRemove The Attachment to be removed
	 * @return void
	 */
	public function removeAttachment(Tx_Nxshowroom_Domain_Model_Attachment $attachmentToRemove) {
		$this->attachment->detach($attachmentToRemove);
	}

	/**
	 * Returns the attachment
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Attachment> $attachment
	 */
	public function getAttachment() {
		return $this->attachment;
	}

	/**
	 * Sets the attachment
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Attachment> $attachment
	 * @return void
	 */
	public function setAttachment(Tx_Extbase_Persistence_ObjectStorage $attachment) {
		$this->attachment = $attachment;
	}

	/**
	 * Adds a Resource
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Resource $resource
	 * @return void
	 */
	public function addResource(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->resource->attach($resource);
	}

	/**
	 * Removes a Resource
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Resource $resourceToRemove The Resource to be removed
	 * @return void
	 */
	public function removeResource(Tx_Nxshowroom_Domain_Model_Resource $resourceToRemove) {
		$this->resource->detach($resourceToRemove);
	}

	/**
	 * Returns the resource
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Resource> $resource
	 */
	public function getResource() {
		return $this->resource;
	}

	/**
	 * Sets the resource
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Resource> $resource
	 * @return void
	 */
	public function setResource(Tx_Extbase_Persistence_ObjectStorage $resource) {
		$this->resource = $resource;
	}

	/**
	 * Returns the type
	 *
	 * @return Tx_Nxshowroom_Domain_Model_Type $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Type $type
	 * @return void
	 */
	public function setType(Tx_Nxshowroom_Domain_Model_Type $type) {
		$this->type = $type;
	}

	/**
	 * Adds a Tags
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Tags $tag
	 * @return void
	 */
	public function addTag(Tx_Nxshowroom_Domain_Model_Tags $tag) {
		$this->tags->attach($tag);
	}

	/**
	 * Removes a Tags
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Tags $tagToRemove The Tags to be removed
	 * @return void
	 */
	public function removeTag(Tx_Nxshowroom_Domain_Model_Tags $tagToRemove) {
		$this->tags->detach($tagToRemove);
	}

	/**
	 * Returns the tags
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Tags> $tags
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * Sets the tags
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Nxshowroom_Domain_Model_Tags> $tags
	 * @return void
	 */
	public function setTags(Tx_Extbase_Persistence_ObjectStorage $tags) {
		$this->tags = $tags;
	}

}
?>