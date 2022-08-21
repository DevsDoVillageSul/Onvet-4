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

        new Cleave('#brinco', {
            numericOnly: true,
            blocks: [7],
        });

        var loadFile = function(event) {
            var output = document.getElementById('imagePreview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };

        $("#origem").change(function() {
            if ($("#origem").val() === "NASCIMENTO") {
                $('#fornecedor').hide();
            } else if ($("#origem").val() === "COMPRA") {
                $('#fornecedor').show();
            } else if ($("#origem").val() === "OUTROS") {
                $('#fornecedor').show();
            } else {}
        });
    </script>
@endsection
