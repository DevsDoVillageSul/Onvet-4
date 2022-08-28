Você disse:@extends('layouts/contentLayoutMaster')

@section('title', 'ANIMAIS')

@section('content')
    <form id="formAnimalData" class="form" enctype="multipart/form-data" action="{{ url('data/rebanho/animais/save') }}"
        target="uploadImagem" method="post">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Cadastro de Animais</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{ $animal->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label" for="btnDestaque">
                                        Imagem de Destaque
                                        <img src="{{ isset($animal->imagem) ? asset($animal->imagem) : '' }}"
                                            class="img-fluid" id="imagePreview" />
                                    </label>
                                    <button type="button" id="btnDestaque" class="btn btn-outline-secondary btn-block"
                                        onclick="$('#imagem').click();">
                                        <i data-feather='upload'></i>
                                        Escolher Foto
                                    </button>
                                    <input type="file" id="imagem" name="imagem" style="display: none;"
                                        accept="image/*" onchange="loadFile(event)" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="video">Video</label>
                                    <input type="text" name="video" class="form-control" id="video"
                                        placeholder="Digite o código do Video" value="{{ $animal->video ?? '' }}" />
                                </div>
                            </div>
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
                                    <label class="form-label" for="lote">Lotes</label>
                                    <select name="lote_id" id="lote_id" class="form-control" required>
                                        <option value="">Selecione:</option>
                                        @foreach ($lotes as $lote)
                                            <option value="{{ $lote->id }}"
                                                {{ $lote->id == $animal->lote_id ? 'selected="selected"' : '' }}>
                                                {{ $lote->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="origem">Origem</label>
                                    <select name="origem" id="origem" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($animal->getOrigens() as $value => $label)
                                            <option
                                                {{ isset($animal->origem) && $animal->origem == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group" id="dt_nasc">
                                    <label class="form-label" for="nome">Data de nascimento</label>
                                    <input type="date" name="dt_nasc" class="form-control" id="dt_nasc"
                                        placeholder="Digite a data de nascimento" value="{{ $animal->dt_nasc ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="peso">Peso no Nascimento (KG)</label>
                                    <input type="text" name="peso" class="form-control" id="peso"
                                        value="{{ $animal->peso ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome_reg">Nome de registro</label>
                                    <input type="text" name="nome_reg" class="form-control" id="nome_reg"
                                        value="{{ $animal->nome_reg ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="num_reg">Número de registro</label>
                                    <input type="text" name="num_reg" class="form-control" id="num_reg"
                                        value="{{ $animal->num_reg ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="pelagem">Pelagem</label>
                                    <input type="text" name="pelagem" class="form-control" id="pelagem"
                                        value="{{ $animal->pelagem ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="raca">Raça 2</label>
                                    <select name="raca_2" id="raca_2" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($animal->getRacas2() as $value => $label)
                                            <option
                                                {{ isset($animal->raca_2) && $animal->raca_2 == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group" id="fornecedor" style="display: none">
                                    <label class="form-label" for="fornecedor">Fornecedores</label>
                                    <select name="fornecedor_id" id="fornecedor_id" class="form-control">
                                        <option value="">Selecione:</option>
                                        @foreach ($fornecedores as $fornecedor)
                                            <option value="{{ $fornecedor->id }}"
                                                {{ $fornecedor->id == $animal->fornecedor_id ? 'selected="selected"' : '' }}>
                                                {{ $fornecedor->nome }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group" id="dt_entrada" style="display: none">
                                    <label class="form-label" for="dt_entrada">Data de entrada</label>
                                    <input type="date" name="dt_entrada" class="form-control" id="dt_entrada"
                                        value="{{ $animal->dt_entrada ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group" id="peso_entrada" style="display: none">
                                    <label class="form-label" for="peso_entrada">Peso na Entrada (KG)</label>
                                    <input type="text" name="peso_entrada" class="form-control" id="peso_entrada"
                                        value="{{ $animal->peso_entrada ?? '' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="despesa_macho" style="display: none">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Lançar Despesas</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="cat_macho">Categoria</label>
                                                <select name="cat_macho" id="cat_macho" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($animal->getCatMachos() as $value => $label)
                                                        <option
                                                            {{ isset($animal->cat_macho) && $animal->cat_macho == $value ? 'selected="selected"' : '' }}
                                                            value="{{ $value }}">
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="valor">Valor Pago/Cabeça (R$)</label>
                                                <input type="text" name="valor" class="form-control" id="valor"
                                                    value="{{ $animal->valor ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="despesa_femea" style="display: none">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Lançar Despesas</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="cat_femea">Categoria</label>
                                                <select name="cat_femea" id="cat_femea" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($animal->getCatFemeas() as $value => $label)
                                                        <option
                                                            {{ isset($animal->cat_femea) && $animal->cat_femea == $value ? 'selected="selected"' : '' }}
                                                            value="{{ $value }}">
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="valor">Valor Pago/Cabeça (R$)</label>
                                                <input type="text" name="valor" class="form-control" id="valor"
                                                    value="{{ $animal->valor ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="desmame" style="display: none">
                        <div class="col-6 md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Lançar desmame</label>
                                                <div class="custom-control-primary custom-switch">
                                                    <input type="checkbox" name="desmame" class="custom-control-input"
                                                        id="desmame" value="1"
                                                        {{ !isset($animal->desmame) || (isset($animal->desmame) && $animal->desmame == 1) ? 'checked="checked"' : '' }}>
                                                    <label class="custom-control-label" for="desmame">
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
                                    <div class="row" id="cria" style="display: none">
                                        <div class="col-lg-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Crias</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <div class="custom-control-primary custom-switch">
                                                                    <input type="checkbox" name="ativo"
                                                                        class="custom-control-input" id="ativo"
                                                                        value="1"
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    </form>
    <iframe id="uploadImagem" name="uploadImagem" style="display:none;"></iframe>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#formAnimalData').on('submit', function() {
                $('#divLoading').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                setTimeout(function() {
                    $('#divLoading').modal('hide');
                }, 10000);
            });
        });

        new Cleave('#num_reg', {
            numericOnly: true,
            blocks: [4],
        });

        new Cleave('#peso_entrada', {
            numericOnly: true,
            blocks: [4],
        });

        new Cleave('#peso', {
            numericOnly: true,
            blocks: [4],
        });

        new Cleave('#brinco', {
            numericOnly: true,
            blocks: [7],
        });

        new Cleave('#valor', {
            numericOnly: true,
            blocks: [10],
        });

        var loadFile = function(event) {
            var output = document.getElementById('imagePreview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };

        $("#sexo").change(function() {
            if ($("#sexo").val() === "FEMEA") {
                $('#despesa_macho').hide();
                $('#cria').show();
                $('#despesa_femea').show();
                $('#desmame').show();
            } else if ($("#sexo").val() === "MACHO") {
                $('#cria').hide();
                $('#despesa_femea').hide();
                $('#despesa_macho').show();
                $('#desmame').show();
            } else {
                $('#cria').hide();
                $('#despesa_macho').hide();
                $('#despesa_femea').hide();
                $('#desmame').hide();
            }
        });

        $("#origem").change(function() {
            if ($("#origem").val() === "NASCIMENTO") {
                $('#fornecedor').hide();
                $('#dt_entrada').hide();
                $('#peso_entrada').hide();
            } else if ($("#origem").val() === "COMPRA") {
                $('#fornecedor').show();
                $('#dt_entrada').show();
                $('#peso_entrada').show();
            } else if ($("#origem").val() === "OUTROS") {
                $('#fornecedor').show();
                $('#dt_entrada').show();
                $('#peso_entrada').show();
            } else {
                $('#fornecedor').hide();
                $('#dt_entrada').hide();
                $('#peso_entrada').hide();
            }
        });
    </script>
@endsection
