{{--É NECESSÁRIO RODAR O COMANDO composer require illuminate/html E ALTERAR ACRESCENTAR LINHA NO ARQUIVO config/app.php--}}

{!! Form::label('customer', 'Cliente') !!}<br>
{!! Form::text('customer', null, ['class'=>"form-control form-width-md <% validar(job.job) %>", 'ng-model'=>'job.customer', 'ng-required'=>'true', 'init-model'=>'job.customer']) !!}<br>



{!! Form::label('job', 'Job') !!}<br>
{!! Form::text('job', null, ['class'=>"form-control form-width-md <% validar(job.job) %>", 'ng-model'=>'job.job', 'ng-required'=>'true', 'init-model'=>'job.job']) !!}<br>






{{--SELECT DINÂMICO--}}
<?php
/*foreach($customers as $customer){
    $clientes2[$customer->id] = $customer->name;
}
*/?>
{{--
{!! Form::label('customer_id', 'Cliente') !!}<br>
{!! Form::select('customer_id',
$clientes2,
null, ['class'=>"form-control <% validar(job.customer_id) %>", 'ng-model'=>'job.customer_id', 'init-model'=>'job.customer_id']) !!}<br>--}}
