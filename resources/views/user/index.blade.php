@extends('layouts.app')
@section('pageTitle','User')

@section('content')
        <h1>User</h1>
        <div class="button"><a href="{{ route('user.create') }}" class="btn btn-outline-secondary">New User</a></div>

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Role</th>
                <th scope="col">Services</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $users as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->role->role ?? '' }}</td>
                  <td><a href="{{route('user.edit',$item->id)}}" class="btn btn-outline-dark fa fa-edit">edit</a></td>
                  <td>
                    <form action="{{ route('user.delete',$item->id) }}" method="POST" class="delete" data-title="{{ $item->email }}" data-body="Wollen Sie den/die User*in <strong> {{ $item->email }}</strong> löschen!">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger fa fa-trash">delete</button>
                  </form>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
@endsection

@section('javascript')
  @if( session('success') )
      window.myToastr('success', '{{ session('success') }}' );
  @elseif( session('error') )
      window.myToastr('error', '{{ session('error') }}' );
  @endif
@endsection
