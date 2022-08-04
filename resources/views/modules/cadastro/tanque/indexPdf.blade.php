@extends('layouts.templatePDF', ['header' => 'Tanques', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Capacidade (L)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tanques as $tanque)
        <tr>
            <td>
                {{ $tanque->nome }}
            </td>
            <td>
                {{ $tanque->litros }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection