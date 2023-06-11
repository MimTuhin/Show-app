<table style="border: 1px solid black">

    <thead>
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>

      </tr>
    </thead>


    <tbody>
        @foreach ($data as $product)


        <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $product->name }}</td>

          </tr>

        @endforeach


    </tbody>
  </table>
