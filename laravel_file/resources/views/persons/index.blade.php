@extends('layouts.admin.main')

@section('title', 'Persons')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Products</h1>
            <x-forms.buttons.create mainRoute="persons" />
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Personal Code</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{$person->id}}</td>
                        <td>{{$person->name}}</td>
                        <td>{{$person->personal_code}}</td>
                        <td>
                            <x-forms.buttons.action :model="$person" mainRoute="persons" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
