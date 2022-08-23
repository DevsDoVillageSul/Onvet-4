@extends('layouts/contentLayoutMaster')

@section('title', ' Cadastrar protocolos indução')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastrar protocolos indução
                </h3>
            </div>
            <div class="card-body">
                <form id="formInducaoData" action="{{ url('data/protocolos/inducoes/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $inducao->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome"
                                    placeholder="Digite o nome" value="{{ $inducao->nome ?? '' }}" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Descrição</label>
                                <textarea class="form-control" name="desc" id="desc" rows="5"
                                    placeholder="Digite a descrição" required>{{ $inducao->desc ?? '' }}</textarea>
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
        $('#formInducaoData').on('submit', function () {
            postData('formInducaoData', '{{ url("protocolos/inducoes") }}');
            return false;
        });
    });
</script>
@endsection