@extends('layouts.admin.main')

@section('title', 'Addresses')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Products</h1>
            <a href="{{route('addresses.create')}}" class="btn btn-primary">Create</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($addresses as $address)
                    <tr>
                        <td>{{$address->id}}</td>
                        <td>{{$address->country}}</td>
                        <td>{{$address->user_id}}</td>
                        <td>
                            <a href="{{route('addresses.edit', $address->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('addresses.show', $address->id)}}" class="btn btn-primary">View</a>
                            <form action="{{route('addresses.destroy', $address->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
