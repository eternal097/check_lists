@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>Ваш уникальный идентификатор:{{$user->id}}</p>
                        <p>Ваше имя:{{$user->name}}</p>
                        <p>Ваш email:{{$user->email}}</p>
                        <p>Дата регистрации:{{$user->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
