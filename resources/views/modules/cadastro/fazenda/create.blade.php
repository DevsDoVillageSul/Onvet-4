@extends('layouts/contentLayoutMaster')

@section('title', 'Fazendas')

@section('content')
    <form id="formFazendaData" action="{{ url('data/cadastros/fazendas/save') }}" class="form">
        <input type="hidden" name="id" id="id" value="{{ $fazenda->id ?? '0' }}" />
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dados Gerais</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Funcionário" value="{{ $fazenda->nome ?? '' }}"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Endereço</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label class="form-label col-12" for="btnCep">&nbsp;</label>
                                <div class="input-group mb-2">
                                    <input type="text" id="cep" name="cep"
                                        value="{{ $fazenda->cep ?? '' }}" class="form-control"
                                        placeholder="Digite o CEP..." aria-label="Digite o CEP..." aria-describedby="btnCep"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="btnCep" onclick="searchPostalCode();">
                                            <i data-feather="search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="endereco">Endereço</label>
                                    <input name="endereco" type="text" id="endereco" class="form-control"
                                        placeholder="Digite o nome da Rua" autocomplete="off"
                                        aria-label="Digite o nome da Rua" value="{{ $fazenda->endereco ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="cidade">Cidade</label>
                                    <input name="cidade" type="text" id="cidade" placeholder="Digite a Cidade"
                                        class="form-control" autocomplete="off" value="{{ $fazenda->cidade ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="uf">UF</label>
                                    <select name="uf" id="uf" class="form-control" required>
                                        <option value=""></option>
                                        <option value="AC" {{ $fazenda->uf == 'AC' ? 'selected="selected"' : '' }}>
                                            AC</option>
                                        <option value="AL" {{ $fazenda->uf == 'AL' ? 'selected="selected"' : '' }}>
                                            AL</option>
                                        <option value="AP" {{ $fazenda->uf == 'AP' ? 'selected="selected"' : '' }}>
                                            AP</option>
                                        <option value="AM" {{ $fazenda->uf == 'AM' ? 'selected="selected"' : '' }}>
                                            AM</option>
                                        <option value="BA" {{ $fazenda->uf == 'BA' ? 'selected="selected"' : '' }}>
                                            BA</option>
                                        <option value="CE" {{ $fazenda->uf == 'CE' ? 'selected="selected"' : '' }}>
                                            CE</option>
                                        <option value="DF" {{ $fazenda->uf == 'DF' ? 'selected="selected"' : '' }}>
                                            DF</option>
                                        <option value="ES" {{ $fazenda->uf == 'ES' ? 'selected="selected"' : '' }}>
                                            ES</option>
                                        <option value="GO" {{ $fazenda->uf == 'GO' ? 'selected="selected"' : '' }}>
                                            GO</option>
                                        <option value="MA" {{ $fazenda->uf == 'MA' ? 'selected="selected"' : '' }}>
                                            MA</option>
                                        <option value="MT" {{ $fazenda->uf == 'MT' ? 'selected="selected"' : '' }}>
                                            MT</option>
                                        <option value="MS" {{ $fazenda->uf == 'MS' ? 'selected="selected"' : '' }}>
                                            MS</option>
                                        <option value="MG" {{ $fazenda->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            MG</option>
                                        <option value="PA" {{ $fazenda->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            PA</option>
                                        <option value="PB" {{ $fazenda->uf == 'PB' ? 'selected="selected"' : '' }}>
                                            PB</option>
                                        <option value="PR" {{ $fazenda->uf == 'PR' ? 'selected="selected"' : '' }}>
                                            PR</option>
                                        <option value="PE" {{ $fazenda->uf == 'PE' ? 'selected="selected"' : '' }}>
                                            PE</option>
                                        <option value="PI" {{ $fazenda->uf == 'PI' ? 'selected="selected"' : '' }}>
                                            PI</option>
                                        <option value="RJ" {{ $fazenda->uf == 'RJ' ? 'selected="selected"' : '' }}>
                                            RJ</option>
                                        <option value="RN" {{ $fazenda->uf == 'RN' ? 'selected="selected"' : '' }}>
                                            RN</option>
                                        <option value="RS" {{ $fazenda->uf == 'RS' ? 'selected="selected"' : '' }}>
                                            RS</option>
                                        <option value="RO" {{ $fazenda->uf == 'RO' ? 'selected="selected"' : '' }}>
                                            RO</option>
                                        <option value="RR" {{ $fazenda->uf == 'RR' ? 'selected="selected"' : '' }}>
                                            RR</option>
                                        <option value="SC" {{ $fazenda->uf == 'SC' ? 'selected="selected"' : '' }}>
                                            SC</option>
                                        <option value="SP" {{ $fazenda->uf == 'SP' ? 'selected="selected"' : '' }}>
                                            SP</option>
                                        <option value="SE" {{ $fazenda->uf == 'SE' ? 'selected="selected"' : '' }}>
                                            SE</option>
                                        <option value="TO" {{ $fazenda->uf == 'TO' ? 'selected="selected"' : '' }}>
                                            TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            {{ !isset($fazenda->ativo) || (isset($fazenda->ativo) && $fazenda->ativo == 1) ? 'checked="checked"' : '' }}>
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
                                <button type="submit" class="btn btn-primary data-submit mr-1">
                                    <i data-feather='save'></i>
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $("#uf").select2();

            $('#formFazendaData').on('submit', function() {
                postData('formFazendaData', '{{ url('cadastros/fazendas') }}');
                return false;
            });
            new Cleave('#numero', {
                numericOnly: true,
                blocks: [5],
            });
            
        });
    </script>
@endsection
