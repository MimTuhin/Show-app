@extends('admin.layouts.master')


@section('content')

<div class="container">

<form action="{{ route('color.update', $data->id) }}" method="POST">

    @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input
          type="text"
          class="form-control"
          id="name"
          name="title"
          value="{{ $data->title }}"
          placeholder ="PLZ Enter Product Name">

        </div>


<button class="btn btn-sm btn-primary"> Save </button>
      </form>

</div>


@endsection
