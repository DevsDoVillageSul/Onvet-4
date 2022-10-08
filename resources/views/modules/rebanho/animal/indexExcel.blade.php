<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Sangue</th>
            <th>Raça</th>
            <th>Brinco</th>
            <th>Origem</th>
            <th>Data de Nascimento</th>
            <th>Peso</th>
            <th style="width: 5%;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($animais as $animal)
            <tr>
                <td>
                    {{ $animal->nome }}
                </td>
                <td>
                    {{ $animal->sexo }}
                </td>
                <td>
                    {{ $animal->sangue }}
                </td>
                <td>
                    {{ $animal->getRaca() }}
                </td>
                <td>
                    {{ $animal->brinco }}
                </td>
                <td>
                    {{ $animal->origem }}
                </td>
                <td>
                    {{ $animal->dt_nasc }}
                </td>
                <td>
                    {{ $animal->peso }}
                </td>
                <td>{!! Helper::getAtivoInativo($animal->ativo, true) !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>
