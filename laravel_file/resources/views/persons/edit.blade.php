@extends('layouts.admin.main')

@section('title', 'Edit Person')

@section('content')
    <h1>Edit {{$person->name}}'s Details</h1>
    <span>Update Form</span>
    <form action="{{route('persons.update', $person->id)}}" method="post">
        @method('PATCH')
        @csrf
        <label>Name         </label><input type="text" name="name" placeholder="Name" value="{{$person->name}}" class="@error('name') is-invalid @enderror"><br>
        <label>Surname      </label><input type="text" name="surname" placeholder="surname" value="{{$person->surname}}" class="@error('surname') is-invalid @enderror"><br>
        <label>Personal Code</label><input type="text" name="personal_code" placeholder="personal_code" value="{{$person->personal_code}}" class="@error('personal_code') is-invalid @enderror"><br>
        <label>Email        </label><input type="text" name="email" placeholder="email" value="{{$person->email}}" class="@error('email') is-invalid @enderror"><br>
        <label>Phone        </label><input type="text" name="phone" placeholder="phone" value="{{$person->phone}}" class="@error('phone') is-invalid @enderror"><br>
        <input type="hidden" name="user_id" placeholder="user_id" value="1" class="@error('user_id') is-invalid @enderror"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Update">
    </form>
@endsection
