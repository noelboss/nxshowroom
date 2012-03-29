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
class Tx_Nxshowroom_Domain_Repository_TypeRepository extends Tx_Extbase_Persistence_Repository {

	public function findAll() {
		$resourceRepository = t3lib_div::makeInstance('Tx_Nxshowroom_Domain_Repository_ResourceRepository');

        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(false);

        $query->setOrderings(array(
			'title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING,
        ));

        return $query->execute();
    }


	public function findByTag($tag = 0, $limit = 10) {
		$resourceRepository = t3lib_div::makeInstance('Tx_Nxshowroom_Domain_Repository_ResourceRepository');

        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(true);

        $query->setOrderings(array(
            'title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING,
        ));

        $res = $query->execute();
		foreach ($res as $key => $value) {
				$res[$key]['resource'] = $resourceRepository->findByTagAndType($tag, $value['uid'], $value['uid']);
		}
		return $res;

    }

}
?>