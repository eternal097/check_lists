@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit title Your task "{{$task->message}}"</div>
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
                    <form action="{{route('task.update', $task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3 w-100">
                            <input type="text" class="form-control form-control-lg" name="message"
                            value="{{$task->message}}" aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="bytton-addon2">Edit task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
