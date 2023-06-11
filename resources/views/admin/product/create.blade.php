@extends('admin.layouts.master')


@section('content')

<div class="container">

    <a class="btn btn-primary btn-sm" href="{{ route('product.index') }}"> Back </a>

    

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
<label>Category</label>
<select class="form-control" name="category_id">

    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name ?? '' }}</option>

    @endforeach

</select>
    </div>





        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder ="PLZ Enter Product Name"
          value="{{ old('name') }}">

        </div>

        @error('name')
        <span class="text-danger">{{ $message }}</span>
                  @enderror


                  <div class="mb-3">
                    <label>Colors</label> <br>
                    @foreach ($colors as $color)
                        <input type="checkbox" name="color_id[]" value="{{ $color->id }}"/> {{ $color->title }} <br>
                    @endforeach

                  </div>
                  {{-- <div class="mb-3">
                    <label>Color</label> <br>
                    @foreach ($colors as $color)
                    <input
                    type="checkbox" name="color_id" value="{{ $color->id }}"/> {{ $color->title }}  <br>
                    @endforeach


                  </div> --}}
                  {{-- @if(file_exists(storage_path().'/app/public/products'.$product->image) &&
                  (!is_null($product->image)))


                  <img src="{{ asset('storage/products'.$proruct->image) }}" height="70">
                  {{-- <img class="card-img-top" src="{{asset('storage/app/public/products/'.$data->image)}}" alt="{{$data->image}}"> --}}

                  {{-- @else
                  <img class="img-fluid w-100" src="{{ asset('img/images.png') }}" Style="height: 70px">

                  @endif --}} --

                  <label>Upload Image</label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">

                  <div>
                    <button class="btn btn-sm btn-primary"> Save </button>
                  </div>

      </form>

</div>


@endsection
