<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 22.09.2017
 * Time: 11:43
 */

namespace common\services\SearchService;

use common\models\entity\ItemElasticSearch\ItemElasticSearchInterface;

interface SearchServiceInterface
{

    /**
     * @param string $searchString
     * @return ItemElasticSearchInterface[]
     * @throws \yii\base\InvalidConfigException
     *
     */
    public function findItemBySearchQuery(string $searchString);
}