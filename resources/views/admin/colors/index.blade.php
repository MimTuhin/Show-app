@extends('admin.layouts.master')


@section('content')
<br>
<br>

<div class="container">

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Well Done!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Well Done!</strong> {{ session('errors') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

    <div class="card">
        <div class="card-body">

            <a class="btn btn-primary btn-md mb-3" href="{{ route('color.create') }}" > Add New color </a>







<table class="table table-bordered">

<thead>

<tr>
    <th>Serial no</th>
    <th>color Name</th>
    <th>Actions</th>
</tr>

</thead>

<tbody>

@foreach ($data as $color)

<tr>
    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
    <td>{{ $color->title }}</td>
    <td>
        <a class="btn btn-sm btn-primary">Show</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('color.edit', $color->id) }}">Edit</a>

        {{-- <a class="btn btn-sm btn-danger">Delete</a> --}}
        <form action="{{ route('color.destroy', $color->id) }}" method="POST"
            style="display: inline">

            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>



        </form>

    </td>

        </tr>

@endforeach




</tbody>

</table>

        </div>
    </div>

</div>

@endsection
