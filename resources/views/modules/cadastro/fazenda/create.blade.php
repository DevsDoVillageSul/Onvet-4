@extends('layouts/contentLayoutMaster')

@section('title', 'FAZENDAS')

@section('content')
    <form id="formFazendaData" class="form" enctype="multipart/form-data" action="{{ url('data/cadastros/fazendas/save') }}"
        target="uploadImagem" method="post">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Cadastro de Fazendas</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{ $fazenda->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label" for="btnDestaque">
                                        Imagem de Destaque
                                        <img src="{{ isset($fazenda->imagem) ? asset($fazenda->imagem) : '' }}"
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
                                        placeholder="Digite o código do Video" value="{{ $fazenda->video ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome da Fazenda" value="{{ $fazenda->nome ?? '' }}"
                                        required />
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
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
            $("#uf").select2();

            $(document).ready(function() {
                $('#formFazendaData').on('submit', function() {
                    $('#divLoading').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    setTimeout(function() {
                        $('#divLoading').modal('hide');
                    }, 10000);
                });
            });
            var loadFile = function(event) {
                var output = document.getElementById('imagePreview');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src)
                }
            };
            new Cleave('#cep', {
                numericOnly: true,
                blocks: [5, 3],
                delimiters: ["-"]
            });
        });
    </script>
@endsection
