<?php

namespace App\Http\Controllers;

use App\Repo\Calculator\CalculatorInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalcController extends Controller
{
    protected $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }


    /**
     * Main form calculator
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('form.calc');
    }

    public function execute(Request $request)
    {
        $result = $this->calculator->count($request);

        return response(['result'=>$result]);
    }
}
