@extends('layouts.admin.main')

@section('title', 'Person')

@section('content')
    <div class="row">
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="https://picsum.photos/200">
                    <span class="card-title">{{ $person->name }}</span>
                </div>
                <div class="card-content">
                    <div>ID: {{$person->id}}</div>
                    <p>surname: {{ $person->surname }}</p>
                    <p>personal_code: {{ $person->personal_code }}</p>
                    <p>email: {{ $person->email}}</p>
                    <p>phone: {{ $person->phone }}</p>
                    <p>user_id: {{ $person->user_id }}</p>
                </div>
                <div class="card-action">
                    <x-forms.buttons.action :model="$person" mainRoute="persons" />
                </div>
            </div>
        </div>
    </div>
@endsection
