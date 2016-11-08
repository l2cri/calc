@extends('app')

@section('content')
    <div class="header">
        <h1>Калькулятор</h1>
    </div>

    <div class="jumbotron">
        {!! Form::open(['url'=>'execute-calc/','method'=>'PATCH','class'=>'form-horizontal','id'=>'form-calc']) !!}
        <div class="form-group">
            <div class="col-sm-6">
                {!! Form::label('num1','Первое число:',['class'=>'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('num1',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                {!! Form::label('num2','Второе число:',['class'=>'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('num2',null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('operation','Действие:',['class'=>'col-sm-1 control-label']) !!}
            <div class="col-sm-11">
                {!! Form::select('operation', ['sum'=>'Сложение','sub'=>'Вычитание','multi'=>'Умножение',"degree"=>"Деление"],null,['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9">
                <div id="result-calc"  class="form-control"></div>
            </div>
            <div class="col-sm-3">
                {!! Form::submit('Рассчитать',['class'=>'btn btn-primary pull-right']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop