<table>
    <thead>
    <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>


    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
