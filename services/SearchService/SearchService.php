<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 22.09.2017
 * Time: 11:43
 */

namespace common\services\SearchService;

use app\models\BlogIndexModel\BlogElasticSearchEntityInterface;
use common\models\repository\ItemElasticSearch\BlogElasticSearchRepositoryInterface;
use yii\elasticsearch\ActiveRecord;

class SearchService implements SearchServiceInterface
{
    /**
     * @var BlogElasticSearchRepositoryInterface
     */
    private $blogElasticSearchRepository;


    /**
     * SearchService constructor.
     * @param BlogElasticSearchRepositoryInterface $blogElasticSearchRepository
     */
    public function __construct(
        BlogElasticSearchRepositoryInterface $blogElasticSearchRepository
    )
    {
        $this->blogElasticSearchRepository = $blogElasticSearchRepository;
    }

    /**
     * @param string $searchString
     * @return BlogElasticSearchEntityInterface[]|ActiveRecord
     * @throws \yii\base\InvalidConfigException
     */
    public function findItemBySearchQuery(string $searchString)
    {
        $elasticModels = $this->blogElasticSearchRepository->getBySearchString($searchString);
        return $elasticModels;
    }

}