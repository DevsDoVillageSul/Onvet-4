@extends('layouts/contentLayoutMaster')

@section('title', 'Embriões')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Embriões
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formEmbriaoData" action="{{ url('data/rebanho/embrioes/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $embriao->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Sêmen" value="{{ $embriao->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">Tipos</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($embriao->getTipos() as $value => $label)
                                            <option
                                                {{ isset($embriao->tipo) && $embriao->tipo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#formEmbriaoData').on('submit', function() {
                postData('formEmbriaoData', '{{ url('rebanho/embrioes') }}');
                return false;
            });
        });
    </script>
@endsection
