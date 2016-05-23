@extends('layouts.app')
{{--@section('title', 'Bem Vindo')--}}
@section('content')
    <div ng-controller="jobCtrl">
        <div class="box-padrao">
            <h1>Jobs</h1>
            <button class="btn btn-primary" ng-click="mostrarForm=!mostrarForm">Novo Job</button>
            <br><br>
            <div ng-show="mostrarForm">
                <span class="texto-obrigatorio" ng-show="form.$invalid">campos obrigatórios</span><br><br>

                {!! Form::open(['name' =>'form']) !!}
                <input type="hidden" ng-model="job.customer_id">
                <div class="btn btn-sucess" ng-show="job.customer_id!=''"><% job.customerName %></div>

                @include('job._form')
                <button class="btn btn-info" type="button" ng-click="inserir()" ng-disabled="form.$invalid">Salvar</button>
                <br>
                {!! Form::close()!!}
            </div>
        </div>

        <br>
        <div class="row">
            <div class="box-padrao">
                <input class="form-control" type="text" ng-model="dadoPesquisa" placeholder="Pesquisa"/>
                <br>
                <div><% mensagemPesquisar %></div>
                <div ng-show="processandoListagem"><i class="fa fa-spin fa-spinner"></i> Processando...</div>
                <h2 class="tabela_vazia" ng-show="!processandoListagem && totalItens==0">Nenhum registro encontrado!</h2>
                <table ng-show="totalItens>0" class="table table-striped">
                    <thead>
                    <tr>
                        <td ng-click="ordernarPor('id')" style="jobr:pointer;">
                            Id
                            <i ng-if="ordem=='id' && sentidoOrdem=='asc'" class="fa fa-angle-double-down"></i>
                            <i ng-if="ordem=='id' && sentidoOrdem=='desc'" class="fa fa-angle-double-up"></i>
                        </td>
                        <td ng-click="ordernarPor('job')" style="jobr:pointer;">
                            Job
                            <i ng-if="ordem=='job' && sentidoOrdem=='asc'" class="fa fa-angle-double-down"></i>
                            <i ng-if="ordem=='job' && sentidoOrdem=='desc'" class="fa fa-angle-double-up"></i>
                        </td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="job in jobs">
                        <td><% job.id %></td>
                        <td><% job.job %></td>
                        <td>
                            <div>
                                <a><i data-toggle="modal" data-target="#modalExcluir" class="fa fa-remove" ng-click="perguntaExcluir(job.id, job.job)"></i></a>
                                <a href="detalhar-job/<% job.id %>"><i class="fa fa-edit"></i></a>
                                <a href="materia/<% job.id %>"><i class="fa fa-book"></i></a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <!--<button class="btn btn-primary btn-block" ng-click="loadMore()" ng-hide="currentPage==lastPage">Load More</button>-->
            <div ng-show="totalItens > 0" class="clan-paginacao">
                <div class="item-paginacao">
                    <uib-pagination total-items="totalItens" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" force-ellipses="true" items-per-page="itensPerPage" num-pages="numPages"></uib-pagination>
                </div>
                <div class="item-paginacao">
                    <select class="form-control itens-por-pagina item-paginacao"  ng-model="itensPerPage">
                        <option ng-selected="true">10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
                <div class="item-paginacao">
                    <div class="resumo-pagina"><% primeiroDaPagina %> - <% (ultimoDaPagina) %> de <% totalItens %></div>
                </div>
            </div>
        </div>

        <!-- Modal Excluir-->
        <div class="modal fade" id="modalExcluir" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Excluir</h4>
                    </div>
                    <div class="modal-body">
                        <p><% tituloExcluir %></p>
                        <div ng-show="processandoExcluir"><i class="fa fa-spin fa-spinner"></i> Processando...</div>
                        <div class="mensagem-ok"><% mensagemExcluido %></div>
                    </div>
                    <div id="opcoesExcluir" class="modal-footer" ng-show="!excluido">
                        <button id="btnExcluir" type="button" class="btn btn-default" ng-click="excluir(idExcluir);">Sim</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                    </div>
                    <div id="fecharExcluir" class="modal-footer" ng-show="excluido">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Excluir-->
    </div>

@endsection