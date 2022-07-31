<table>
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
        @endforeach
    </tbody>
</table>