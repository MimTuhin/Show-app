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

            <a class="btn btn-primary btn-md mb-3" href="{{ route('category.create') }}" > Add New Category </a>

            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-secondary m-1" href="{{ route('category.excel') }}">Download Excel </a>

                <a class="btn btn-sm btn-success m-1" href="{{ route('category.pdf') }}"> PDF </a>

                <a class="btn btn-sm btn-warning m-1" href="{{ route('category.trashlist') }}"> Trash Bin </a>
            </div>


<form class="d-flex" action="" method="GET">
    <input name="keyword" class="form-control" placeholder="Serach.."/>
    <button type="submit" class="btn btn-sm btn-primary">
        <i class="fa fa-search"></i>
        Search</button>
</form>


<table class="table table-bordered">

<thead>

<tr>
    <th>Serial no</th>
    <th>Category Name</th>
    <th>Actions</th>
</tr>

</thead>

<tbody>

@foreach ($data as $category)

<tr>
    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
    <td>{{ $category->name }}</td>
    <td>
        <a class="btn btn-sm btn-primary">Show</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('category.edit', $category->id) }}">Edit</a>

        {{-- <a class="btn btn-sm btn-danger">Delete</a> --}}
        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
            style="display: inline">

            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>

<a href="{{ route('categories.products', $category->id) }}"> Products </a>


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
