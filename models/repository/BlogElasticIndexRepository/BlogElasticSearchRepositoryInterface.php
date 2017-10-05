<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 22.09.2017
 * Time: 15:00
 */

namespace common\models\repository\ItemElasticSearch;

use app\models\BlogIndexModel\BlogElasticSearchEntityInterface;
use  yii\elasticsearch\ActiveRecord;

interface BlogElasticSearchRepositoryInterface
{

    /**
     * @param string $searchString
     * @return ActiveRecord
     * @throws \yii\base\InvalidConfigException
     */
    public function getBySearchString(string $searchString);

    /**
     * @param int $primaryKey
     * @return null|ActiveRecord|BlogElasticSearchEntityInterface
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\elasticsearch\Exception
     */
    public function getByPrimaryKey(int $primaryKey);

    /**
     * @param BlogElasticSearchEntityInterface $itemElasticSearch
     * @return mixed
     */
    public function delete(BlogElasticSearchEntityInterface $itemElasticSearch);

    /**
     * @param BlogElasticSearchEntityInterface $itemElasticSearch
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\elasticsearch\Exception
     */
    public function insert(BlogElasticSearchEntityInterface $itemElasticSearch);
}