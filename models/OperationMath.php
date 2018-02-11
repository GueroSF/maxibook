<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 11.02.18
 * Time: 18:21
 */

namespace app\models;

/**
 * Class OperationMath
 * Выполняет вычисления
 */
class OperationMath
{
    private $num1;
    private $num2;
    private $action;

    public function __construct(array $numbers,$operation)
    {
        $this->num1 = $numbers[0];
        $this->num2 = $numbers[1];
        $this->action = $operation;
    }

    /**
     * Выполняет вычисления или выводит предупреждение если деление на ноль
     *
     * @return mixed|string
     */
    public function result()
    {
        if ($this->num2 == 0){
            return 'Деление на ноль. Не в этот раз.';
        }
        $func = $this->num1.Actions::ACTIONS[$this->action].$this->num2;
        return eval('return '.$func.';');
    }
}