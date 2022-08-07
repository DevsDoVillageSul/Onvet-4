@extends('layouts/contentLayoutMaster')

@section('title', 'Sêmens')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Cadastro de Sêmens
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formSemenData" action="{{ url('data/rebanho/semens/save') }}" class="form">
                        <input type="hidden" name="id" id="id" value="{{ $semen->id ?? '0' }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        placeholder="Digite o Nome do Sêmen" value="{{ $semen->nome ?? '' }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="registro">Registro</label>
                                    <input type="text" name="registro" class="form-control" id="registro"
                                        placeholder="Digite o registro do sêmen" value="{{ $semen->registro ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="central">Central</label>
                                    <input type="text" name="central" class="form-control" id="abv"
                                        placeholder="Digite a central" value="{{ $semen->central ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="raca">Raças</label>
                                    <select name="raca" id="raca" class="form-control" required>
                                        <option value=""></option>
                                        @foreach ($semen->getRacas() as $value => $label)
                                            <option
                                                {{ isset($semen->raca) && $semen->raca == $value ? 'selected="selected"' : '' }}
                                                value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="nome">Tipos de Sêmen</label>
                                    <div class="input-group mb-2">
                                        <select multiple id="tipos" name="tipos[]" class="form-control" required>
                                            <option value=""></option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Convencional', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Convencional">
                                                Convencional
                                            </option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Sexado Macho', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Sexado Macho">
                                                Sexado Macho
                                            </option>
                                            <option
                                                {{ is_array($semen->tipos) && in_array('Sexado Fêmea', $semen->tipos) ? 'selected="selected"' : '' }}
                                                value="Sexado Fêmea">
                                                Sexado Fêmea
                                            </option>
                                        </select>
                                    </div>
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
            $('#formSemenData').on('submit', function() {
                postData('formSemenData', '{{ url('rebanho/semens') }}');
                return false;
            });

            $('#tipos').select2({
                closeOnSelect: false
            });
        });
    </script>
@endsection
