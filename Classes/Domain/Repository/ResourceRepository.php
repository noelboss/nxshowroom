<?php

/* * *************************************************************
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
 * ************************************************************* */

/**
 *
 *
 * @package nxshowroom
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Nxshowroom_Domain_Repository_ResourceRepository extends Tx_Extbase_Persistence_Repository {

	public function findByTag($tag = 0, $limit = 10) {
		if($tag < 1){
			return;
		}
		$now = time();
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(false);
        $queryText = '
			SELECT tx_nxshowroom_domain_model_resource.*
                FROM tx_nxshowroom_resource_tags_mm AS mm
                LEFT JOIN tx_nxshowroom_domain_model_resource ON tx_nxshowroom_domain_model_resource.uid = mm.uid_local

				WHERE mm.uid_foreign IN ('.$tag.')
					AND tx_nxshowroom_domain_model_resource.deleted=0
					AND tx_nxshowroom_domain_model_resource.t3ver_state<=0
					AND tx_nxshowroom_domain_model_resource.pid<>-1
					AND tx_nxshowroom_domain_model_resource.hidden=0
					AND tx_nxshowroom_domain_model_resource.starttime<='.$now.'
					AND (tx_nxshowroom_domain_model_resource.endtime=0 OR tx_nxshowroom_domain_model_resource.endtime>'.$now.')
					AND tx_nxshowroom_domain_model_resource.sys_language_uid IN (0,-1)
					AND tx_nxshowroom_domain_model_resource.pid IN (10) LIMIT '.$limit;

		$query->statement($queryText);

        $result = $query->execute();
        return $result;


	}

	public function findByTagAndType($tag = 0, $typs = 0, $limit = 100) {
		if($tag < 1){
			return;
		}
		$now = time();
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(false);
        $queryText = '
			SELECT tx_nxshowroom_domain_model_resource.*
                FROM tx_nxshowroom_resource_tags_mm AS mm
                LEFT JOIN tx_nxshowroom_domain_model_resource ON tx_nxshowroom_domain_model_resource.uid = mm.uid_local

				WHERE mm.uid_foreign IN ('.$tag.')
					AND tx_nxshowroom_domain_model_resource.type IN ('.$typs.')
					AND tx_nxshowroom_domain_model_resource.deleted=0
					AND tx_nxshowroom_domain_model_resource.t3ver_state<=0
					AND tx_nxshowroom_domain_model_resource.pid<>-1
					AND tx_nxshowroom_domain_model_resource.hidden=0
					AND tx_nxshowroom_domain_model_resource.starttime<='.$now.'
					AND (tx_nxshowroom_domain_model_resource.endtime=0 OR tx_nxshowroom_domain_model_resource.endtime>'.$now.')
					AND tx_nxshowroom_domain_model_resource.sys_language_uid IN (0,-1)
					AND tx_nxshowroom_domain_model_resource.pid IN (10) LIMIT '.$limit;
		$query->statement($queryText);
        $result = $query->execute();
        return $result;


	}

}

?>