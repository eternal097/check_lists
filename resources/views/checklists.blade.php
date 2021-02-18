@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <!-- Add checklist form -->
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
                    @if(count($checklists) < $max)
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
                    @else
                    <div class="alert alert-danger">
                        <p>Maximum number of checklists: {{ $max }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Checklists card -->
            <div class="card mt-3">
                <div class="card-header">
                    Your checklists
                </div>
                @if(count($checklists) != 0)
                <div class="card-body">
                    @foreach($checklists as $checklist)
                    <div class="row mt-1">
                        <div class="col-9">
                            <p class="lead mt-1"><a href="{{route('checklist.show', $checklist->id)}}">{{$checklist->title}}</a></p>
                        </div>
                        <div class="col-1">
                            <a href="{{route('checklist.edit', $checklist->id)}}" class="btn btn-info mr-3">Edit</a>
                        </div>
                        <div class="col-1">
                          <form action="{{route('checklist.destroy', $checklist->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" name="button">Delete</button>
                          </form>
                        </div>
                    </div>
                    @endforeach
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
