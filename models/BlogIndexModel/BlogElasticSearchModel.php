<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.09.17
 * Time: 20:38
 */
namespace app\models\BlogIndexModel;


class BlogElasticSearchModel extends \yii\elasticsearch\ActiveRecord
{
    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'author',
            'date',
            'category',
            'title',
            'tags',
            'description',
        ];
    }

    /**
     * @return string
     */
    public static function index()
    {
        return 'blog';
    }

    /**
     * @return string
     */
    public static function type()
    {
        return 'item';
    }
}