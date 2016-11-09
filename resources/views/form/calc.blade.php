@extends('app')

@section('content')
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <div class="alert alert-info" role="alert">
                <h4>Приложение использует следующие элементы:</h4>
                <ul>
                    <li><a href="https://laravel.com/" class="alert-link">Laravel</a>.</li>
                    <li><a href="http://getbootstrap.com/" class="alert-link">Bootstrap</a>.</li>
                    <li><a href="https://jqueryvalidation.org/" class="alert-link">jQuery Validation Plugin</a>.</li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Калькулятор</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['url'=>'execute-calc/','method'=>'PATCH','class'=>'form-horizontal','id'=>'form-calc']) !!}
                <div class="form-group">
                    {!! Form::label('num1','Первое число:',['class'=>'col-sm-4 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('num1',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('num2','Второе число:',['class'=>'col-sm-4 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('num2',null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('operation','Действие:',['class'=>'col-sm-4 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('operation', $operation,null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('result','Результат:',['class'=>'col-sm-4 control-label']) !!}
                    <div class="col-sm-5">
                        <div id="result-calc" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-4">
                        {!! Form::submit('Рассчитать',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
             </div>
        </div>
    </div>
</div>
@stop