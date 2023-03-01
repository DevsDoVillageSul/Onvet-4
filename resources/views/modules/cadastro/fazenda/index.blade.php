@extends('layouts/contentLayoutMaster')

@section('title', 'Fazendas')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Fazendas</h4>
                <div style="float: right;">
                    <a href="{{ url('cadastros/fazendas/create/0') }}" class="btn btn-outline-primary waves-effect">
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
                            <th>#</th>
                            <th style="width: 140px;">Imagem</th>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Endereço</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 5%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fazendas as $fazenda)
                            <tr>
                                <td>
                                    {{ $fazenda->id }}
                                </td>
                                <td>
                                    @if (isset($fazenda->imagem))
                                        <img src="{{ asset($fazenda->imagem) }}" class="img-fluid" />
                                    @endif
                                </td>
                                <td>
                                    {{ $fazenda->nome }}
                                </td>
                                <td>
                                    {{ $fazenda->cidade }}
                                </td>
                                <td>
                                    {{ $fazenda->uf }}
                                </td>
                                <td>
                                    {{ $fazenda->endereco }}
                                </td>
                                <td>
                                    {!! Helper::getAtivoInativo($fazenda->ativo) !!}
                                </td>
                                <td nowrap>
                                    <a href="{{ url('cadastros/fazendas/create') }}/{{ $fazenda->id ?? null }}"
                                        class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-warning waves-effect"
                                        alt="Apagar" title="Apagar"
                                        onclick="deleteItem('{{ url('rebanho/animais/delete') }}/{{ $fazenda->id ?? null }}');">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('shared.paginate', ['form' => 'formSearch', 'itens' => $animais ?? null])
        </div>
    </div>
    </div>
@endsection
