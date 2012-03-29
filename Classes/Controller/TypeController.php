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
class Tx_Nxshowroom_Controller_TypeController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * typeRepository
	 *
	 * @var Tx_Nxshowroom_Domain_Repository_TypeRepository
	 */
	protected $typeRepository;

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
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$types = $this->typeRepository->findAll();
		$this->view->assign('types', $types);
	}

	/**
	 * action show
	 *
	 * @param $type
	 * @return void
	 */
	public function showAction(Tx_Nxshowroom_Domain_Model_Type $type) {
		$this->view->assign('type', $type);
	}

	/**
	 * action new
	 *
	 * @param $newType
	 * @dontvalidate $newType
	 * @return void
	 */
	public function newAction(Tx_Nxshowroom_Domain_Model_Type $newType = NULL) {
		$this->view->assign('newType', $newType);
	}

	/**
	 * action create
	 *
	 * @param $newType
	 * @return void
	 */
	public function createAction(Tx_Nxshowroom_Domain_Model_Type $newType) {
		$this->typeRepository->add($newType);
		$this->flashMessageContainer->add('<h4 class="alert-heading">Okay!</h4> Your new Type was created.');
		$this->redirect('list', 'Resource');
	}

	/**
	 * action edit
	 *
	 * @param $type
	 * @return void
	 */
	public function editAction(Tx_Nxshowroom_Domain_Model_Type $type) {
		$this->view->assign('type', $type);
	}

	/**
	 * action update
	 *
	 * @param $type
	 * @return void
	 */
	public function updateAction(Tx_Nxshowroom_Domain_Model_Type $type) {
		$this->typeRepository->update($type);
		$this->flashMessageContainer->add('<h4 class="alert-heading">Okay!</h4> Your Type was updated.');
		$this->redirect('list', 'Resource');
	}

}
?>