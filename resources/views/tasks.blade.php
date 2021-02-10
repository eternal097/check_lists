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
                                <div class="row mt-1">
                                    <div class="col-1">
                                        @if($task->completed == 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="col-7">
                                        <p class="lead">{{$task->message}}</p>
                                    </div>
                                    <div class="col-1 mr-4">
                                      <form action="{{route('task.update', $task->id)}}" method="POST">
                                          @csrf
                                          @method('PUT')
                                          @if($task->completed == 0)
                                              <input type="text" name="completed" value="1" hidden>
                                              <button class="btn btn-success" type="submit">Success</button>
                                          @else
                                              <input type="text" name="completed" value="0" hidden>
                                              <button class="btn btn-warning" type="submit">Success</button>
                                          @endif
                                      </form>
                                    </div>
                                    <div class="col-1 ml-1">
                                        <a href="{{route('task.edit', $task->id)}}" class="btn btn-info">Edit</a>
                                    </div>
                                    <div class="col-1">
                                      <form action="{{route('task.destroy', $task->id)}}" method="POST">
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
