@extends('admin.layouts.master')

@section('content')

<div class="container">
    <br>
    <br>

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

<h6 class="text-center"> Product List </h6>




<a class="btn btn-sm btn-primary mb-3" href="{{ route('product.index') }}"> Back </a>

{{-- <div class="d-flex justify-content-end">
    <button class="btn btn-sm btn-secondary m-1" > Excel </button>
    <a class="btn btn-sm btn-success m-1" href="{{ route('product.pdf') }}"> PDF </a>
    <a class="btn btn-sm btn-warning m-1"> Trash Bin </a>
</div> --}}


<table class="table table-bordered">

    <thead>
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($data as $product)


        <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->stock }}</td>

            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('product.restore', $product->id) }}">Restore</a>


<form action="{{ route('product.forcedelete', $product->id) }}"  method="POST"
    style="display: inline">

    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger"> Force Delete</button>
</form>




            </td>
          </tr>

        @endforeach


    </tbody>
  </table>

</div>
@endsection

