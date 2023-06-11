@extends('admin.layouts.master')



@section('content')



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="{{ route('category.index') }}"> List </a>
<div class="card-body">

    Category:
    Name:{{ $category->name }}
<br>

Products List:

@foreach ($category->products as $product)

<li>{{ $product->name }}</li>
@endforeach


</div>

</div>
@endsection
