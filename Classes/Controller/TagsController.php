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
class Tx_Nxshowroom_Controller_TagsController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * tagsRepository
	 *
	 * @var Tx_Nxshowroom_Domain_Repository_TagsRepository
	 */
	protected $tagsRepository;

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
	 * @return void
	 */
	public function listAction() {
		$tagss = $this->tagsRepository->findAll();
		$this->view->assign('tagss', $tagss);
	}

	/**
	 * action new
	 *
	 * @param $newTags
	 * @dontvalidate $newTags
	 * @return void
	 */
	public function newAction(Tx_Nxshowroom_Domain_Model_Tags $newTags = NULL) {
		$this->view->assign('newTags', $newTags);
	}

	/**
	 * action create
	 *
	 * @param $newTags
	 * @return void
	 */
	public function createAction(Tx_Nxshowroom_Domain_Model_Tags $newTags) {
		$this->tagsRepository->add($newTags);
		$this->flashMessageContainer->add('Your new Tags was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $tags
	 * @return void
	 */
	public function editAction(Tx_Nxshowroom_Domain_Model_Tags $tags) {
		$this->view->assign('tags', $tags);
	}

	/**
	 * action update
	 *
	 * @param $tags
	 * @return void
	 */
	public function updateAction(Tx_Nxshowroom_Domain_Model_Tags $tags) {
		$this->tagsRepository->update($tags);
		$this->flashMessageContainer->add('Your Tags was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $tags
	 * @return void
	 */
	public function deleteAction(Tx_Nxshowroom_Domain_Model_Tags $tags) {
		$this->tagsRepository->remove($tags);
		$this->flashMessageContainer->add('Your Tags was removed.');
		$this->redirect('list');
	}

}
?>