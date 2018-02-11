<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 10.02.18
 * Time: 23:25
 */

namespace app\models;


use yii\base\Model;


class FormMath extends Model
{
    public $num1;
    public $num2;
    public $action;

    public function rules()
    {
        return [
            [['num1', 'num2'], 'required'],
            [
                ['num1', 'num2'],
                function ($attribute, $params) {
                    $num = new Number(['num' => $this->$attribute]);
                    if (!$num->validate('num')) {
                        $this->addErrors([$attribute => $num->errors]);
                    }
                }
            ],
            ['action', 'in', 'range' => array_keys(Actions::ACTIONS)]
        ];
    }

    public function attributeLabels()
    {
        return [
            'num1'   => 'Число 1',
            'num2'   => 'Число 2',
            'action' => 'Действие',
        ];
    }

    public function result()
    {
        if ($this->num2 == 0){
            return 'Деление на ноль. Не в этот раз.';
        }
        $func = $this->num1.Actions::ACTIONS[$this->action].$this->num2;
        return eval('return '.$func.';');
    }
}