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
class Tx_Nxshowroom_Controller_AttachmentController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * attachmentRepository
	 *
	 * @var Tx_Nxshowroom_Domain_Repository_AttachmentRepository
	 */
	protected $attachmentRepository;

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
	 * injectAttachmentRepository
	 *
	 * @param Tx_Nxshowroom_Domain_Repository_AttachmentRepository $attachmentRepository
	 * @return void
	 */
	public function injectAttachmentRepository(Tx_Nxshowroom_Domain_Repository_AttachmentRepository $attachmentRepository) {
		$this->attachmentRepository = $attachmentRepository;
	}

	/**
	 * action show
	 *
	 * @param Tx_Nxshowroom_Domain_Model_Attachment $attachment
	 * @param Tx_Nxshowroom_Domain_Model_Resource $resource
	 * @return void
	 */
	public function showAction(Tx_Nxshowroom_Domain_Model_Attachment $attachment, Tx_Nxshowroom_Domain_Model_Resource $resource = NULL) {
		$this->view->assign('attachment', $attachment);
		$this->view->assign('resource', $resource);
	}

	/**
	 * action new
	 *
	 * @param $newAttachment
	 * @dontvalidate $newAttachment
	 * @return void
	 */
	public function newAction(Tx_Nxshowroom_Domain_Model_Attachment $newAttachment = NULL) {
		$resource = $this->request->hasArgument('resource') ? $this->request->getArgument('resource') : NULL;
		$resourceRepository = t3lib_div::makeInstance('Tx_Nxshowroom_Domain_Repository_ResourceRepository');

		$this->view->assign('resource', $resourceRepository->findByUid($resource));
		$this->view->assign('newAttachment', $newAttachment);
	}

	/**
	 * action create
	 *
	 * @param $newAttachment
	 * @param Tx_Nxshowroom_Domain_Model_Resource $resource
	 * @return void
	 */
	public function createAction(Tx_Nxshowroom_Domain_Model_Attachment $newAttachment, Tx_Nxshowroom_Domain_Model_Resource $resource) {
		$this->attachmentRepository->add($newAttachment);
		$resource->addAttachment($newAttachment);
		$this->flashMessageContainer->add('Your new Attachment was created.');
		$this->redirect('show','Resource', NULL, array('resource' => $resource->getUid()));
	}

	/**
	 * action edit
	 *
	 * @param $attachment
	 * @return void
	 */
	public function editAction(Tx_Nxshowroom_Domain_Model_Attachment $attachment) {
		$resource = $this->request->hasArgument('resource') ? $this->request->getArgument('resource') : NULL;
		$resourceRepository = t3lib_div::makeInstance('Tx_Nxshowroom_Domain_Repository_ResourceRepository');

		$this->view->assign('resource', $resourceRepository->findByUid($resource));
		$this->view->assign('attachment', $attachment);
	}

	/**
	 * action update
	 *
	 * @param $attachment
	 * @return void
	 */
	public function updateAction(Tx_Nxshowroom_Domain_Model_Attachment $attachment) {
		$resource = $this->request->hasArgument('resource') ? $this->request->getArgument('resource') : NULL;
		$resourceRepository = t3lib_div::makeInstance('Tx_Nxshowroom_Domain_Repository_ResourceRepository');

		$this->attachmentRepository->update($attachment);
		$this->flashMessageContainer->add('Your Attachment was updated.');

		$this->redirect('show','Resource', NULL, array('resource' => $resourceRepository->findByUid($resource)));
	}

	/**
	 * action delete
	 *
	 * @param $attachment
	 * @return void
	 */
	public function deleteAction(Tx_Nxshowroom_Domain_Model_Attachment $attachment) {
		$resource = $this->request->hasArgument('resource') ? $this->request->getArgument('resource') : NULL;

		$this->attachmentRepository->remove($attachment);
		$this->flashMessageContainer->add('Your Attachment was removed.');

		$this->redirect('show','Resource', NULL, array('resource' => $resource->getUid()));
	}

}
?>