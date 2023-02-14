@extends('layouts.admin.main')

@section('title', 'New Person')

@section('content')
    <h1>New Product</h1>
    <span>New Product Form</span>
    <form action="{{route('persons.store')}}" method="post">
        @csrf
        <input type="file" name="image">
        <input type="text" name="name" placeholder="Name" value="name" class="@error('name') is-invalid @enderror"><br>
        <input type="text" name="surname" placeholder="surname" value="" class="@error('surname') is-invalid @enderror"><br>
        <input type="text" name="personal_code" placeholder="personal_code" value="" class="@error('personal_code') is-invalid @enderror"><br>
        <input type="text" name="email" placeholder="email" value="" class="@error('email') is-invalid @enderror"><br>
        <input type="text" name="phone" placeholder="phone" value="" class="@error('phone') is-invalid @enderror"><br>
        <input type="hidden" name="user_id" placeholder="user_id" value="1" class="@error('user_id') is-invalid @enderror"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection

