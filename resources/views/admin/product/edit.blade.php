@extends('admin.layouts.master')


@section('content')

<div class="container">
    <a class="btn btn-primary btn-sm" href="{{ route('product.index') }}"> Back </a>

<form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" name="category_id">

            @foreach ($categories as $category)

            @if ($category->id == $data->category_id)

            <option value="{{ $category->id }}" selected>{{ $category->name ?? '' }}</option>
            @else
            <option value="{{ $category->id }}">{{ $category->name ?? '' }}</option>
            @endif

            @endforeach

        </select>




        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          value="{{ $data->name }}"
          placeholder ="PLZ Enter Product Name">

        </div>


        <div class="mb-3">
            <label>Colors</label> <br>
            @foreach ($colors as $color)
                <input type="checkbox" name="color_id[]" value="{{ $color->id }}"  {{ (in_array($color->id,
                $selectedColors))? "checked" : "" }}/> {{ $color->title }} <br>
            @endforeach

          </div>
        {{-- @error('name')
        <span class="text-danger">{{ $message }}</span>
                  @enderror --}}
                  <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    >

                  </div>


                  <div>
                    <button class="btn btn-sm btn-primary"> Save </button>
                  </div>
      </form>
</div>
</div>


@endsection
