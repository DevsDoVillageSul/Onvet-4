@extends('layouts/contentLayoutMaster')

@section('title', 'ANIMAIS')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Animais
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formAnimalData" action="{{ url('data/rebanho/animais/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $animal->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Animal" value="{{ $animal->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="brinco">Brinco</label>
                                    <input type="text" name="brinco" class="form-control" id="brinco"
                                       value="{{ $animal->brinco ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($animal->getSexos() as $value => $label)
                                            <option
                                                {{ isset($animal->sexo) && $animal->sexo == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="sangue">Grau de Sangue</label>
                                    <select name="sangue" id="sangue" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($animal->getSangues() as $value => $label)
                                            <option
                                                {{ isset($animal->sangue) && $animal->sangue == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="raca">Raça</label>
                                    <select name="raca" id="raca" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($animal->getRacas() as $value => $label)
                                            <option
                                                {{ isset($animal->raca) && $animal->raca == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="fornecedor">Fornecedores</label>
                                <select name="fornecedor_id" id="fornecedor_id" class="form-control" required>
                                    <option value="">Selecione:</option>
                                    @foreach($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor->id }}" {{$fornecedor->id == $animal->fornecedor_id ?'selected="selected"' : '' }}> {{ $fornecedor->nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="lote">Lotes</label>
                                <select name="lote_id" id="lote_id" class="form-control" required>
                                    <option value="">Selecione:</option>
                                    @foreach($lotes as $lote)
                                    <option value="{{ $lote->id }}" {{$lote->id == $animal->lote_id ?'selected="selected"' : '' }}> {{ $lote->nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="custom-control-primary custom-switch">
                                                        <input type="checkbox" name="ativo" class="custom-control-input"
                                                            id="ativo" value="1"
                                                            {{ !isset($animal->ativo) || (isset($animal->ativo) && $animal->ativo == 1) ? 'checked="checked"' : '' }}>
                                                        <label class="custom-control-label" for="ativo">
                                                            <span class="switch-icon-left">
                                                                <i data-feather="check"></i>
                                                            </span>
                                                            <span class="switch-icon-right">
                                                                <i data-feather="x"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <button type="submit"
                                                    class="btn btn-primary data-submit mr-1">Salvar</button>
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
            $('#formAnimalData').on('submit', function() {
                postData('formAnimalData', '{{ url('rebanho/animais') }}');
                return false;
            });
        });
    </script>
@endsection
