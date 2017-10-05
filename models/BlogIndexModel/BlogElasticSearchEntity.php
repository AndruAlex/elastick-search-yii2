<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.09.17
 * Time: 20:48
 */
namespace app\models\BlogIndexModel;

use yii\base\Exception;

class BlogElasticSearchEntity extends BlogElasticSearchModel implements BlogElasticSearchEntityInterface
{
    /**
     * @return array
     */
    public static function mapping()
    {
        return [
            static::type() => [
                'properties' => [
                    'author'        => ['type' => 'string'],
                    'date'          => ['type' => 'date'],
                    'category'      => ['type' => 'string'],
                    'title'         => ['type' => 'string'],
                    'tags'          => ['type' => 'array'],
                    'description'   => ['type' => 'string'],
                ],
            ],
        ];
    }

    /**
     * @param $data
     * @throws Exception
     */
    public function loadParam($data)
    {
        foreach ($data as $fieldName => $fieldValue) {
            if (in_array($fieldName, static::attributes())) {
                $this->setAttribute($fieldName, $fieldValue);
            };
        }
    }

    /**
     * @return array|mixed
     */
    public function getIndexKey()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->getAttribute('title');
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->getAttribute('date');
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->getAttribute('category');
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->getAttribute('author');
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->getAttribute('tags');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }


}