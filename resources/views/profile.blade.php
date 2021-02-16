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
                        <p>Your id: {{$user->id}}</p>
                        <p>Your name: {{$user->name}}</p>
                        <p>Your email: {{$user->email}}</p>
                        <p>Date registration: {{$user->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
