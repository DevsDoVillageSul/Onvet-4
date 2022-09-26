@extends('layouts.templatePDF', ['header' => 'Inseminação artificial em tempo fixo', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach($iatfs as $iatf)
        <tr>
            <td>
                {{ $iatf->nome }}
            </td>
            <td>
                {{ $iatf->desc }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection