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
	 * injectResourceRepository
	 *
	 * @param Tx_Nxshowroom_Domain_Repository_ResourceRepository $resourceRepository
	 * @return void
	 */
	public function injectResourceRepository(Tx_Nxshowroom_Domain_Repository_ResourceRepository $resourceRepository) {
		$this->resourceRepository = $resourceRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$resources = $this->resourceRepository->findAll();
		$this->view->assign('resources', $resources);
	}

	/**
	 * action show
	 *
	 * @param $resource
	 * @return void
	 */
	public function showAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->view->assign('resource', $resource);
	}

	/**
	 * action new
	 *
	 * @param $newResource
	 * @dontvalidate $newResource
	 * @return void
	 */
	public function newAction(Tx_Nxshowroom_Domain_Model_Resource $newResource = NULL) {
		$this->view->assign('newResource', $newResource);
	}

	/**
	 * action create
	 *
	 * @param $newResource
	 * @return void
	 */
	public function createAction(Tx_Nxshowroom_Domain_Model_Resource $newResource) {
		$this->resourceRepository->add($newResource);
		$this->flashMessageContainer->add('Your new Resource was created.');
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
		$this->flashMessageContainer->add('Your Resource was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $resource
	 * @return void
	 */
	public function deleteAction(Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->resourceRepository->remove($resource);
		$this->flashMessageContainer->add('Your Resource was removed.');
		$this->redirect('list');
	}

}
?>