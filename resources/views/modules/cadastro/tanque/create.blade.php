@extends('layouts/contentLayoutMaster')

@section('title', 'Tanques')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastro de Tanques
                </h3>
            </div>
            <div class="card-body">
                <form id="formTanqueData" action="{{ url('data/cadastros/tanques/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $tanque->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome"
                                    placeholder="Digite o nome" value="{{ $tanque->nome ?? '' }}" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="litros">Capacidade (L)</label>
                                <input type="text" name="litros" class="form-control" id="litros"
                                    placeholder="Digite a quantidade em litros" value="{{ $tanque->litros ?? '' }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
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
    $(document).ready(function(){
        $('#formTanqueData').on('submit', function () {
            postData('formTanqueData', '{{ url("cadastros/tanques") }}');
            return false;
        });
    });
</script>
@endsection