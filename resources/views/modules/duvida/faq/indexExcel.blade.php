<table>
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
        @endforeach
    </tbody>
</table>