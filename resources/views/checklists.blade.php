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
                @if(count($checklists) != 0)
                <div class="card-header">Your checklists</div>
                    <div class="card-body">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            @foreach($checklists as $checklist)
                            <p class="lead mt-3"><a href="{{route('checklist.show', $checklist->id)}}">{{$checklist->title}}</a></p>
                            @endforeach
                            <div class="w-100 d-flex align-items-center mr-3 justify-content-end ">
                                <form class="m-2" action="" method="POST">
                                    @csrf
                                    @method('')
                                    <button class="btn btn-info" type="button" name="button">Edit</button>
                                </form>
                                <form action="{{route('checklist.destroy', $checklist->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                <div class="m-3">
                    <p>Here will be your checklists</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
