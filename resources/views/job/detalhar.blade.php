@extends('layouts.app')
@section('title', 'Bem Vindo')
@section('content')
    {!! Html::script('js/controllers/alterarJobCtrl.js') !!}
    <div ng-controller="alterarJobCtrl">
        <div class="box-padrao">
            <h1>Jobs</h1>
            <div>
                <span class="texto-obrigatorio">campos obrigatórios</span><br><br>

                {!! Form::model($job, ['name' =>'form']) !!}
                @include('job._form')
                <input type="hidden" name="id" ng-model="id" ng-init="id='{{$job->id}}'"/>
                <button class="btn btn-info" type="button" ng-click="alterar()" ng-disabled="form.$invalid && form.job.$dirty">Salvar</button>
                <br><br>
                <div class="mensagem-ok"><% mensagemSalvar %></div>
                <div ng-show="processandoSalvar"><img src="/imagens/load.gif" width="20px"> Processando...</div>
            </div>
        </div>
    </div>
@endsection