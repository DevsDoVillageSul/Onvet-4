<table>
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
        @endforeach
    </tbody>
</table>