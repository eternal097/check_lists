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
                    @foreach($checklists as $checklist)
                        <div class="card-body bg-white w-100">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <p class="lead mt-3 justify-content-between"><a href="{{route('checklist.show', $checklist->id)}}">{{$checklist->title}}</a></p>
                                <div class="w-100 d-flex align-items-center mr-3 justify-content-end ">
                                    <a href="{{route('checklist.edit', $checklist->id)}}" class="btn btn-info mr-3">Edit</a>
                                    <form action="{{route('checklist.destroy', $checklist->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
