@extends('layouts.admin.main')

@section('title', 'New products')

@section('content')
    <h1>New Product</h1>
    <span>New Product Form</span>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Name" value="name" class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="slug" placeholder="Slug" value=""><br>
        <input type="text" name="description" placeholder="Description" value=""><br>
        <input type="file" name="image" placeholder="Image" value=""><br>
        <input type="text" name="category_id" placeholder="Category ID" value=""><br>
        <input type="text" name="color" placeholder="Color" value=""><br>
        <input type="text" name="size" placeholder="Size" value=""><br>
        <input type="text" name="price" placeholder="Price" value=""><br>
        <input type="text" name="status_id" placeholder="Status ID" value=""><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection

