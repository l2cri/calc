<?php
/**
 * Created by PhpStorm.
 * User: l2cri
 * Date: 08.11.16
 * Time: 17:10
 */

namespace App\Providers;


use App\Repo\Calculator\EloquentCalculator;
use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repo\Calculator\CalculatorInterface',function($app){
            return new EloquentCalculator();
        });
    }
}