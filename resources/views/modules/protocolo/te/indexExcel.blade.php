<table>
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
        @endforeach
    </tbody>
</table>