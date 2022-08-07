<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Abreviação</th>
            <th>Sexo</th>
            <th>Fase</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lotes as $lote)
            <tr>
                <td>
                    {{ $lote->nome }}
                </td>
                <td>
                    {{ $lote->desc }}
                </td>
                <td>
                    {{ $lote->abv }}
                </td>
                <td>
                    {{ $lote->getSexo() }}
                </td>
                <td>
                    {{ $lote->getFase() }}
                </td>
              </tr>  
        @endforeach
    </tbody>
</table>
