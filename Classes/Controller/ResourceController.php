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
class Tx_Nxshowroom_Controller_ResourceController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * resourceRepository
	 *
	 * @var Tx_Nxshowroom_Domain_Repository_ResourceRepository
	 */
	protected $resourceRepository;

	/**
	 * typeRepository
	 *
	 * @var Tx_Nxshowroom_Domain_Repository_TypeRepository
	 */
	protected $typeRepository;

	/**
	 * injectResourceRepository
	 *
	 * @param Tx_Nxshowroom_Domain_Repository_ResourceRepository $resourceRepository
	 * @return void
	 */
	public function injectResourceRepository(Tx_Nxshowroom_Domain_Repository_ResourceRepository $resourceRepository) {
		$this->resourceRepository = $resourceRepository;
	}

	/**
	 * injectTypeRepository
	 *
	 * @param Tx_Nxshowroom_Domain_Repository_TypeRepository $typeRepository
	 * @return void
	 */
	public function injectTypeRepository(Tx_Nxshowroom_Domain_Repository_TypeRepository $typeRepository) {
		$this->typeRepository = $typeRepository;
	}

	/**
	 * injectTagsRepository
	 *
	 * @param Tx_Nxshowroom_Domain_Repository_TagsRepository $tagsRepository
	 * @return void
	 */
	public function injectTagsRepository(Tx_Nxshowroom_Domain_Repository_TagsRepository $tagsRepository) {
		$this->tagsRepository = $tagsRepository;
	}

	/**
	 * action list
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Tags $tag
	 * @return void
	 */
	public function listAction(Tx_Nxshowroom_Domain_Model_Tags $tag = NULL) {
		if($tag){
			$types = $this->typeRepository->findByTag($tag->getUid(),5);
			$this->view->assign('tag', $tag);
		} else {
			$types = $this->typeRepository->findAll();
		}

		$this->view->assign('UPLOAD_FOLDER', Tx_Nxshowroom_Utility_Base::$UPLOAD_FOLDER);
		$this->view->assign('types', $types);
	}

	/**
	 * action show
	 *
	 * @param $resource
	 * @return void
	 */
	public function showAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->view->assign('UPLOAD_FOLDER', Tx_Nxshowroom_Utility_Base::$UPLOAD_FOLDER);
		$this->view->assign('resource', $resource);
	}

	/**
	 * action new
	 *
	 * @param $type
	 * @param $newResource
	 * @dontvalidate $newResource
	 * @return void
	 */
	public function newAction(Tx_Nxshowroom_Domain_Model_Type $type, Tx_Nxshowroom_Domain_Model_Resource $newResource = NULL) {
		$this->view->assign('type', $type);
		$this->view->assign('newResource', $newResource);
	}

	/**
	 * action create
	 *
	 * @param $newResource
	 * @param $type
	 * @return void
	 */
	public function createAction(Tx_Nxshowroom_Domain_Model_Resource $newResource, Tx_Nxshowroom_Domain_Model_Type $type) {
		$newResource->setType($type);
		$this->resourceRepository->add($newResource);

		$this->flashMessageContainer->add('<h4 class="alert-heading">Okay!</h4> Your new Resource was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $resource
	 * @return void
	 */
	public function editAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->view->assign('resource', $resource);
	}

	/**
	 * action update
	 *
	 * @param $resource
	 * @return void
	 */
	public function updateAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->resourceRepository->update($resource);
		$this->flashMessageContainer->add('<h4 class="alert-heading">Okay!</h4> Your Resource was updated.');
		$this->redirect('show', NULL, NULL, array('resource' => $resource->getUid()));
	}

	/**
	 * action delete
	 *
	 * @param $resource
	 * @return void
	 */
	public function deleteAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->resourceRepository->remove($resource);
		$this->flashMessageContainer->add('<h4 class="alert-heading">Okay!</h4> Your Resource was removed.');
		$this->redirect('list');
	}

}
?>