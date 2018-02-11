<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 10.02.18
 * Time: 23:02
 */

namespace app\models;


class Actions
{
    const ADDITION = 1;
    const SUBTRACTION = 2;
    const MULTIPLICATION = 3;
    const DIVISION = 4;

    const ACTIONS = [
        self::ADDITION       => '+',
        self::SUBTRACTION    => '-',
        self::MULTIPLICATION => '*',
        self::DIVISION       => '/',
    ];
}