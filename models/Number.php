<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 10.02.18
 * Time: 22:40
 */

namespace app\models;


use yii\base\Model;

/**
 * Class Number
 * @package app\models
 *
 * @property int|float num
 */
class Number extends Model
{
    public $num;

    public function rules()
    {
        return [
            ['num', 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'num' => 'Число',
        ];
    }
}