@extends('admin.layouts.master')



@section('content')



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="{{ route('category.index') }}"> List </a>
<x-alert  type="danger" message="Error Alert"/>
<x-alert  type="success" message="Success Alert"/>
<x-alert  type="warning" message="Warning Alert"/>


<x-card/>


<div class="card-body">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input
            type="text"
            class="form-control"
            name="name"
            placeholder ="PLZ Enter Caegory Name"
            value="{{ old('name') }}">


          </div>

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
