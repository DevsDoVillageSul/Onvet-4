@extends('layouts.templatePDF', ['header' => 'Faq', 'title' => ''])
@section('content')

<table class="table-linhas">
    <thead>
        <tr>
            <th>Perguntas</th>
            <th>Respostas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faqs as $faq)
        <tr>
            <td>
                {{ $faq->pergunta }}
            </td>
            <td>
                {{ $faq->resposta }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection