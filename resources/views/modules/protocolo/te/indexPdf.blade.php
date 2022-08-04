@extends('layouts.templatePDF', ['header' => 'Transferência de Embriões', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tes as $te)
        <tr>
            <td>
                {{ $te->nome }}
            </td>
            <td>
                {{ $te->desc }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection