@extends('layouts/contentLayoutMaster')

@section('title', 'Pastagens')

@section('content')
<form id="formPastagemData" action="{{ url('data/cadastros/pastagens/save') }}" class="form">
    <input type="hidden" name="id" id="id" value="{{ $pastagem->id ?? '0' }}" />
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
                                <label class="form-label" for="nome">Nome/Descrição</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o Nome ou Descrição da Pastagem"
                                 value="{{ $pastagem->nome ?? '' }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($pastagem->getTipos() as $value => $label)
                                    <option 
                                        {{ isset($pastagem->tipo) && $pastagem->tipo == $value ? 'selected="selected"' : '' }}
                                        value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Início</label>
                                <input type="date" name="dt_ini" class="form-control" id="dt_ini"
                                 value="{{ $pastagem->dt_ini ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Finalizada</label>
                                <input type="date" name="dt_fim" class="form-control" id="dt_fim"
                                 value="{{ $pastagem->dt_fim ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Área (ha)</label>
                                <input type="text" name="area" class="form-control" id="area"
                                    placeholder="Digite a área da pastagem" value="{{ $pastagem->area ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Custo de Formação(R$/ha)</label>
                                <input type="text" name="custo" class="form-control" id="custo"
                                  value="{{ $pastagem->custo ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Custo de Formação Total</label>
                                <input type="text" name="total" class="form-control" id="total"
                                  value="{{ $pastagem->total ?? '' }}" />
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
        $('#formPastagemData').on('submit', function() {
            postData('formPastagemData', '{{ url("cadastros/pastagens") }}');
            return false;
        });
    });
</script>
@endsection