<?php
/**
 * Created by PhpStorm.
 * User: l2cri
 * Date: 08.11.16
 * Time: 17:06
 */

namespace App\Repo\Calculator;


use Illuminate\Http\Request;

interface CalculatorInterface
{
    public function count(Request $request);
    public function getOperator();
}