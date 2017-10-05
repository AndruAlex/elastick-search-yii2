<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 22.09.2017
 * Time: 15:00
 */

namespace common\models\repository\ItemElasticSearch;

use app\models\BlogIndexModel\BlogElasticSearchEntity;
use app\models\BlogIndexModel\BlogElasticSearchEntityInterface;
use  yii\elasticsearch\ActiveRecord;


class BlogElasticSearchRepository implements BlogElasticSearchRepositoryInterface
{
    /**
     * @param string $searchString
     * @return ActiveRecord
     * @throws \yii\base\InvalidConfigException
     */
    public function getBySearchString(string $searchString)
    {
        return BlogElasticSearchEntity::find()->query([
            "multi_match" => [
                "query"  => $searchString,
                "fields" => [
                    'title',
                    'description',
                    'author',
                    'category',
                ],
                "type"   => "most_fields"
            ]
        ])->one();
    }

    /**
     * @param int $primaryKey
     * @return null|ActiveRecord|BlogElasticSearchEntity
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\elasticsearch\Exception
     */
    public function getByPrimaryKey(int $primaryKey)
    {
        $elasticModel = BlogElasticSearchEntity::get($primaryKey);
        return $elasticModel;
    }

    /**
     * @param BlogElasticSearchEntityInterface $blogIndexItem
     * @return mixed
     */
    public function delete(BlogElasticSearchEntityInterface $blogIndexItem)
    {
        /**
         * @var ActiveRecord $blogIndexItem;
         */
        return $blogIndexItem->delete();
    }

    /**
     * @param BlogElasticSearchEntityInterface $blogIndexItem
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\elasticsearch\Exception]
     */
    public function insert(BlogElasticSearchEntityInterface $blogIndexItem)
    {
        /**
         * @var ActiveRecord $blogIndexItem;
         */
        $blogIndexItem->insert();
    }

}