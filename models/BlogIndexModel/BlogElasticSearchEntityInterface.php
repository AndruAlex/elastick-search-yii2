<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.09.17
 * Time: 20:48
 */
namespace app\models\BlogIndexModel;


use yii\base\Exception;

/**
 * Interface BlogElasticSearchEntityInterface
 * @package app\models\BlogIndexModel
 */
interface BlogElasticSearchEntityInterface
{

    /**
     * @param $data
     * @throws Exception
     */
    public function loadParam($data);

    /**
     * @return array|mixed
     */
    public function getIndexKey();

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @return mixed
     */
    public function getDate();

    /**
     * @return mixed
     */
    public function getCategory();

    /**
     * @return mixed
     */
    public function getAuthor();

    /**
     * @return mixed
     */
    public function getTags();

    /**
     * @return mixed
     */
    public function getDescription();
}