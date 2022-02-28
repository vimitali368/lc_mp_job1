<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Наименование</th>
        <th>Норма Азот</th>
        <th>Норма Фосфор</th>
        <th>Норма Калий</th>
        <th>Группа культур</th>
        <th>Район</th>
        <th>Стоимость</th>
        <th>Описание</th>
        <th>Назначение</th>
    </tr>
    </thead>
    <tbody>
    @foreach($indexes as $index)
        <tr>
            <td>{{ $index->id }}</td>
            <td>{{ $index->name }}</td>
            <td>{{ $index->norm_nitrogen }}</td>
            <td>{{ $index->norm_phosphorus }}</td>
            <td>{{ $index->norm_potassium }}</td>
            <td>{{ $index->culture_id }}</td>
            <td>{{ $index->district }}</td>
            <td>{{ $index->cost }}</td>
            <td>{{ $index->description }}</td>
            <td>{{ $index->appointment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
