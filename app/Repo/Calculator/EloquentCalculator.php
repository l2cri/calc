<?php
/**
 * Created by PhpStorm.
 * User: l2cri
 * Date: 08.11.16
 * Time: 17:06
 */

namespace app\Repo\Calculator;


use App\Exceptions\CalculatorException;
use Illuminate\Http\Request;

class EloquentCalculator implements CalculatorInterface
{

    public function count(Request $request)
    {
        $action = $request->operation;
        $num1 = $request->num1;
        $num2 = $request->num2;
        $result = false;

        if(method_exists($this,$action))
        {
            $result = $this::$action($num1,$num2);
        }
        else
        {
            throw new CalculatorException("Operation $action not support!");
        }



        return $result;
    }

    private static function sum($num1,$num2)
    {
        return $num1 + $num2;
    }

    private static function sub($num1,$num2)
    {
        return $num1 - $num2;
    }

    private static function multi($num1,$num2)
    {
        return $num1 * $num2;
    }

    private static function degree($num1,$num2)
    {
        return $num1 / $num2;
    }
}