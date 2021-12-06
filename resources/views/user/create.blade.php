@extends('layouts.app')
@section('pageTitle','User')
@section('content')
        <h1>User</h1>
        <div class="button"><a href="{{route('user.index')}}" class="btn btn-outline-secondary">User</a></div>

        <div id="form" class="form">
            <form action="{{ route('user.update',$user->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name',$user->name) }}">
                  @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email',$user->email) }}">
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="role">Roles</label>
                  <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                      <option value="">choose role</option>
                        @foreach ( $roles as $role )
                          <option value="{{$role->id}}" @if( old('role',$user->role_id) ==$role->id ) selected @endif>{{$role->role}}</option>
                        @endforeach
                  </select>
                  @error('role')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror

                <div class="form-group">
                  <label for="password_confirmation">{{ __('Confirm password') }}</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>

                </div>
                <button type="submit" class="btn btn-dark">save</button>
              </form>
        </div>
@endsection
