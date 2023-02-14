@extends('layouts.admin.main')

@section('title', 'Products')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Products</h1>
            <x-forms.buttons.create mainRoute="products" />
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <x-forms.buttons.action :model="$product" mainRoute="products" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
