@extends('layouts/contentLayoutMaster')

@section('title', 'Animais')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Animais</h4>
                <div style="float: right;">
                    <a href="{{ url('rebanho/animais/create/0') }}" class="btn btn-outline-primary waves-effect">
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
                            <th style="width: 140px;">Imagem</th>
                            <th>Nome</th>
                            <th>Video</th>
                            <th>Fazenda</th>
                            <th>Lote</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 5%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animais as $animal)
                            <tr>
                                <td>
                                    @if (isset($animal->imagem))
                                        <img src="{{ asset($animal->imagem) }}" class="img-fluid" />
                                    @endif
                                </td>
                                <td>
                                    {{ $animal->nome }}
                                </td>
                                <td>
                                    {!! nl2br($animal->video) !!}
                                </td>
                                <td>{{ $animal->fazenda->nome }}</td>
                                <td>{{ $animal->lote->nome }}</td>
                                <td>
                                    {!! Helper::getAtivoInativo($animal->ativo) !!}
                                </td>
                                <td nowrap>
                                    <a href="{{ url('rebanho/animais/create') }}/{{ $animal->id ?? null }}"
                                        class="btn btn-icon btn-outline-primary waves-effect" title="Editar">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-warning waves-effect"
                                        alt="Apagar" title="Apagar"
                                        onclick="deleteItem('{{ url('rebanho/animais/delete') }}/{{ $animal->id ?? null }}');">
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
