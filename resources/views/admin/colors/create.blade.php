{{-- @extends('admin.layouts.master')



@section('content')



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="{{ route('color.index') }}"> Back </a>
<div class="card-body">
    <form action="{{ route('color.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">color Name</label>
            <input
            type="title"
            class="form-control"
            name="name"
            placeholder ="PLZ Enter Color Name"
            value="{{ old('name') }}">


          </div>



Is Active
            <input
            type="checkbox"
            name="is_active"
            value="1"/>




          @error('name')
<span class="text-danger">{{ $message }}</span>
          @enderror

<div>
    <button class="btn btn-sm btn-primary" type="submit"> Save </button>
</div>

              </form>
</div>

</div>
@endsection --}}


@extends('admin.layouts.master')



@section('content')



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="{{ route('color.index') }}"> Back </a>
<div class="card-body">
    <form action="{{ route('color.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Color Name</label>
            <input
            type="text"
            class="form-control"
            name="title"
            placeholder ="PLZ Enter Color Name"
            value="{{ old('name') }}">


          </div>

          Is Active
            <input
            type="checkbox"
            name="is_active"
            value="1"/>

          @error('name')
<span class="text-danger">{{ $message }}</span>
          @enderror

<div>
    <button class="btn btn-sm btn-primary" type="submit"> Save </button>
</div>

              </form>
</div>

</div>
@endsection
