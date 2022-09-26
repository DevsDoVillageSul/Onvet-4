@extends('layouts.templatePDF', ['header' => 'Protocolos de indução', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inducoes as $inducao)
        <tr>
            <td>
                {{ $inducao->nome }}
            </td>
            <td>
                {{ $inducao->desc }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection