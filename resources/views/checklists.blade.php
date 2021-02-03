@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Your checklists</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('checklist.store')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3 w-100">
                            <input type="text" class="form-control form-control-lg" name="title"
                            placeholder="Type title Your checklist..." aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="bytton-addon2">Add checklist</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Your checklists</div>
                <div class="card-body">
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="">
                            @foreach($checklists as $checklist)
                            <p><a href="{{route('checklist.show', $checklist->id)}}">{{$checklist->title}}</a></p>
                            <div>
                                <form action="{{route('cheklist.update', $checklist->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" value="1" hidden>
                                    <button></button>
                                </form>
                            </div>
                            @endforeach  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection