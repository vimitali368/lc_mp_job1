<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Наименование</th>
        <th>Дата договора</th>
        <th>Стоимость поставки</th>
        <th>Регион</th>
    </tr>
    </thead>
    <tbody>
    @foreach($indexes as $index)
        <tr>
            <td>{{ $index->id }}</td>
            <td>{{ $index->name }}</td>
            <td>{{ $index->contract_date }}</td>
            <td>{{ $index->delivery_cost }}</td>
            <td>{{ $index->region }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
