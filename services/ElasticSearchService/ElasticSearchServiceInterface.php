<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 21.09.2017
 * Time: 16:36
 */

namespace common\services\ElasticSearchService;

interface ElasticSearchServiceInterface
{
    /**
     * @param int $primaryKey
     * @param array $data
     * @return mixed
     */
    public function createIndex(int $primaryKey, array $data);
}