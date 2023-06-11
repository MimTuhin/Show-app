@extends('admin.layouts.master')


@section('content')
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



<a class="btn btn-sm btn-primary mb-3" href="{{ route('product.index') }}"> Back </a>


    <div class="card">
        <div class="card-body">



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
                                <a class="btn btn-sm btn-primary" href="{{ route('category.restore', $category->id) }}">Restore</a>


                <form action="{{ route('category.forcedelete', $category->id) }}"  method="POST"
                    style="display: inline">

                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are You Sure Want Delete')"
                    class="btn btn-sm btn-danger"> Force Delete</button>
                </form>




                            </td>
                          </tr>

                        @endforeach


                    </tbody>
                  </table>
            {{-- <a class="btn btn-primary btn-md mb-3" href="{{ route('category.create') }}" > Add New Category </a>

            <div class="d-flex justify-content-end">
                {{-- <a class="btn btn-sm btn-secondary m-1" href="{{ route('category.excel') }}">Download Excel </a> --}}

                {{-- <a class="btn btn-sm btn-success m-1" href="{{ route('category.pdf') }}"> PDF </a>

                <a class="btn btn-sm btn-warning m-1" href="{{ route('category.trashlist') }}"> Trash Bin </a> --}}
            </div>
        </div>







</div>

@endsection
