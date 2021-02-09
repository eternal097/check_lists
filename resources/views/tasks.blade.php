@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <!-- Add task form -->
            <div class="card">
                <div class="card-header">Create Your Tasks</div>
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
                    <form action="{{route('task.store', ['id' => $checklist_id])}}" method="POST">
                        @csrf
                        <div class="input-group mb-3 w-100">
                            <input type="text" class="form-control form-control-lg" name="message"
                            placeholder="Type message Your task..." aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="bytton-addon2">Add task</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Tasks card -->
            <div class="card mt-3">
                <div class="card-header">
                    Your tasks
                </div>
                @if(count($tasks) != 0)
                <div class="card-body">
                    @foreach($tasks as $task)
                    <div class="row">
                        <div class="col-8">
                            <p class="lead mt-1">{{$task->message}}</p>
                        </div>
                        <div class="col-2 pl-5">
                            <a href="" class="btn btn-info mr-3">Edit</a>
                        </div>
                        <div class="col-2 pl-3">
                          <form action="" method="POST">
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
                    <p>Here will be your tasks</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
