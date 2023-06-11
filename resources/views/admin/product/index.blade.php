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


{{-- User : {{ auth()->user()->name ?? '' }} --}}

@can('product_create')
<a class="btn btn-sm btn-primary mb-3" href="{{ route('product.create') }}"> Add New Product </a>
@endcan


<div class="d-flex justify-content-end">
    <a class="btn btn-sm btn-secondary m-1" href="{{ route('product.excel') }}" >Download Excel </a>
    <a class="btn btn-sm btn-success m-1" href="{{ route('product.pdf') }}"> PDF </a>

    <a class="btn btn-sm btn-warning m-1" href="{{ route('product.trashlist') }}"> Trash Bin </a>
</div>


<table class="table table-bordered" id="datatablesSimple">

    <thead class="table-dark">
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Colors</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($products as $data)

        <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->category->name ?? 'No Category' }}</td>
            <td>
@foreach ($data->colors as $color)
<li>{{ $color->title ?? '' }}</li>
@endforeach
            </td>
            <td>{{ $data->price }}</td>


            <td>
                {{-- @dd($data) --}}

@if(file_exists(storage_path().'/app/public/products'.$data->image) &&
(!is_null($data->image)))


<img src="{{ asset('storage/products'.$data->image) }}" height="70">
{{-- <img class="card-img-top" src="{{asset('storage/app/public/products/'.$data->image)}}" alt="{{$data->image}}"> --}}

@else
<img class="img-fluid w-100" src="{{ asset('img/images.png') }}" Style="height: 70px">

@endif

            </td>
            <td>{{ $data->stock }}</td>

            <td>
                <button class="btn btn-sm btn-primary">Show</button>


                @can('product_edit')
                <a class="btn btn-sm btn-secondery" href="{{ route('product.edit', $data->id) }}">Edit</a>
                @endcan


                @can('product_delete')

                <form action="{{ route('product.destroy', $data->id) }}" method="POST"
                    style="display: inline">

                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>
                </form>

                @endcan






            </td>
          </tr>

        @endforeach


    </tbody>
  </table>

</div>
@endsection

