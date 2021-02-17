@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users list</div>
                <div class="card-body">
                  @if(count($users) != 0)
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Maximum checklists</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            <form action="{{route('userUpdate', $user->id)}}" method="POST">
                              @csrf
                              @method('PATCH')
                              <select class="form-select" aria-label="Default select example" name="max_checklist">
                                <option selected>{{ $user->max_checklist }}</option>
                                @for ($i = 1; $i < 11; $i++)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              </select>
                              <button class="btn btn-primary btn-sm" type="submit" name="button">Edit</button>
                            </form>
                          </td>
                          <td>
                            @foreach(App\User::find($user->id)->getRoleNames() as $role)
                                {{ $role }}
                            @endforeach
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  @else
                  <div class="m-3">
                      <p>Here will be users...</p>
                  </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
