<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Abreviação</th>
            <th>Sexo</th>
            <th>Fase</th>
            <th>Status</th>
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
                <td>
                    {!! Helper::getAtivoInativo($lote->ativo, true) !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
