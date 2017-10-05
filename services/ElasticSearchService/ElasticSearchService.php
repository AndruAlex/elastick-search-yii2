<?php
/**
 * Created by PhpStorm.
 * User: a.andrushok
 * Date: 21.09.2017
 * Time: 16:36
 */

namespace common\services\ElasticSearchService;

use app\models\BlogIndexModel\BlogElasticSearchEntity;
use common\models\repository\ItemElasticSearch\BlogElasticSearchRepositoryInterface;

class ElasticSearchService implements ElasticSearchServiceInterface
{
    /**
     * @var BlogElasticSearchRepositoryInterface
     */
    private $itemElasticSearchRepository;

    /**
     * ElasticSearchService constructor.
     * @param BlogElasticSearchRepositoryInterface $itemElasticSearchRepository
     */
    public function __construct(
        BlogElasticSearchRepositoryInterface $itemElasticSearchRepository
    )
    {
        $this->itemElasticSearchRepository = $itemElasticSearchRepository;
    }

    /**
     * @param int $primaryKey
     * @param array $data
     * @return mixed
     */
    public function createIndex(int $primaryKey,array $data)
    {
        $oldElasticModel = $this->itemElasticSearchRepository->getByPrimaryKey($primaryKey);
        if ($oldElasticModel !== null) {
            $this->itemElasticSearchRepository->delete($oldElasticModel);
        }
        $elasticSearchModel = new BlogElasticSearchEntity();
        $elasticSearchModel->loadParam($data);
        $res = $this->itemElasticSearchRepository->insert($elasticSearchModel);
        return $res;
    }

}