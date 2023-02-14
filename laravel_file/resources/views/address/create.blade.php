@extends('layouts.admin.main')

@section('title', 'New Address')

@section('content')
    <h1>New Product</h1>
    <span>New Product Form</span>
    <form action="{{route('addresses.store')}}" method="post">
        <input type="text" name="name" placeholder="Name" value=""><br>
        <input type="text" name="country" placeholder="Country" value=""><br>
        <input type="text" name="city" placeholder="City" value=""><br>
        <input type="text" name="zip" placeholder="Zip" value=""><br>
        <input type="text" name="street" placeholder="Street" value=""><br>
        <input type="text" name="house_number" placeholder="House Number" value=""><br>
        <input type="text" name="apartment_number" placeholder="Apartment Number" value=""><br>
        <input type="text" name="state" placeholder="State" value=""><br>
        <input type="text" name="additional_info" placeholder="Additional Information" value=""><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn" value="Create">
    </form>
@endsection
