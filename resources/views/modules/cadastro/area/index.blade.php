@extends('layouts/contentLayoutMaster')

@section('title', 'Áreas')

@section('content')
    <div class="row" id="table-hover-row">
    <div class="col-lg-12 col-12">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Quantidade de Áreas</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text mr-25 mb-0"></p>
                            </div>
                        </div>

                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather='slack'></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">
                                                {{ $resume->ativos + $resume->inativos }}
                                            </h4>
                                            <p class="card-text font-small-3 mb-0">Áreas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather='check-square'></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">
                                                {{ $resume->ativos }}
                                            </h4>
                                            <p class="card-text font-small-3 mb-0">Ativos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather='square'></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">
                                                {{ $resume->inativos }}
                                            </h4>
                                            <p class="card-text font-small-3 mb-0">Inativos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listagem de Áreas</h4>
                    <div style="float: right;">
                        <a href="{{ url('cadastros/areas/create/0') }}" class="btn btn-outline-primary waves-effect">
                            <i data-feather="plus-circle" class="mr-50"></i>
                            <span>Novo</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include('shared.alerts')
                    <form class="form-horizontal form-label-left" id="formSearch" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="page" id="page" value="{{ $request->page or ' ' }}" />
                        <div class="row d-flex">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Busca Livre..." id="search"
                                        name="search" value="{{ $request->search ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-3 col-12 mb-50">
                                <div class="form-group">
                                    <button class="btn btn-outline-success btn-block text-nowrap px-1 waves-effect"
                                        type="submit">
                                        <i data-feather='search'></i>
                                        <span>Pesquisar</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 col-12 mb-50">
                                <div class="form-group">
                                    <button class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                        type="submit" name="export" value="XLS">
                                        <i data-feather='download'></i>
                                        <span>Excel</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 col-12 mb-50">
                                <div class="form-group">
                                    <button class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                        type="submit" name="export" value="PDF">
                                        <i data-feather='download'></i>
                                        <span>PDF</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Fazenda</th>
                                <th>Tipo</th>
                                <th>Inicio</th>
                                <th>Finalizada</th>
                                <th>Área(ha)</th>
                                <th>Vida Útil(Anos)</th>
                                <th>Observação</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 5%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>
                                        {{ $area->nome }}
                                    </td>
                                    <td>{{ $area->fazenda->nome }}</td>
                                    <td>
                                        {{ $area->getTipo() }}
                                    </td>
                                    <td>
                                        {{ $area->dt_ini }}
                                    </td>
                                    <td>
                                        {{ $area->dt_fim }}
                                    </td>
                                    <td>
                                        {{ $area->ha }}
                                    </td>
                                    <td>
                                        {{ $area->util }}
                                    </td>
                                    <td>
                                        {{ $area->observacao }}
                                    </td>
                                    <td>
                                        {!! Helper::getAtivoInativo($area->ativo) !!}
                                    </td>

                                    <td nowrap>
                                        <a href="{{ url('cadastros/areas/create') }}/{{ $area->id ?? null }}"
                                            class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                            <i data-feather="edit-2"></i>1
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-warning waves-effect"
                                            alt="Apagar" title="Apagar"
                                            onclick="deleteItem('{{ url('cadastros/areas/delete') }}/{{ $area->id ?? null }}');">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('shared.paginate', ['form' => 'formSearch', 'itens' => $areas ?? null])
            </div>
        </div>
    </div>
@endsection
