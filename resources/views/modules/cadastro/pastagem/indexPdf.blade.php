@extends('layouts.templatePDF', ['header' => 'Tanques', 'title' => ''])
@section('content')
    <table class="table-linhas">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Custo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastagens as $pastagem)
                <tr>
                     <td>
                    {{ $pastagem->nome }}
                </td>
                <td>
                    {{ $pastagem->dt_ini }}
                </td>
                <td>
                    {{ $pastagem->dt_fim }}
                </td>
                <td>
                    {{ $pastagem->dt_ini }}
                </td>
                <td>
                    {{ $pastagem->getTipo() }}
                </td>
                <td>
                    {{ $pastagem->custo }}
                </td>
                <td>
                    {{ $pastagem->total }}
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
