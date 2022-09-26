<table>
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
        @endforeach
    </tbody>
</table>