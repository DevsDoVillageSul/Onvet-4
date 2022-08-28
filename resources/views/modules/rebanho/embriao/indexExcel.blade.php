<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Tipos</th>
            <th>Pai</th>
            <th>Mãe</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($embrioes as $embriao)
            <tr>
                <td>
                    {{ $embriao->nome }}
                </td>
                <td>
                    {{ $embriao->tipo }}
                </td>
                <td>
                    {{ $embriao->animais->nome }}
                </td>
                <td>
                    {{ $embriao->animal->nome }}
                </td>
              </tr>  
        @endforeach
    </tbody>
</table>
