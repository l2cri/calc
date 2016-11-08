@extends('app')

@section('content')
    <h1>Калькулятор</h1>

    {!! Form::open(['url'=>'execute-calc/','method'=>'PATCH','class'=>'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-sm-6 container">
                {!! Form::label('num1','Первое число:',['class'=>'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('num1',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6 container">
                {!! Form::label('num2','Второе число:',['class'=>'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('num2',null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::select('operation', ['sum'=>'Сложение','min'=>'Вычитание','multi'=>'Умножение',"degree"=>"Деление"],null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Рассчитать',['class'=>'btn btn-primary pull-right']) !!}
        </div>
    {!! Form::close() !!}
@stop