@extends('layouts.templatePDF', ['header' => 'Fazendas', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade / UF</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fazendas as $fazenda)
                <tr>
                    <td>
                        {{ $fazenda->nome }}
                    </td>
                    <td>
                        {{ $fazenda->endereco }}
                    </td>P
                    <td>
                        {{ $fazenda->cidade }} - {{ $fazenda->uf }}
                    </td>
                    <td>
                        {!! Helper::getAtivoInativo($fazenda->ativo, true) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
