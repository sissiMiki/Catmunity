@extends('layouts.app')
@section('pageTitle','cat.index')
@section('content')
        <h1>cat</h1>
        <div class="button"><a href="{{ route('cat.create') }}">new cat</a></div>
{{-- @if( session('success') )
      <div class="alert alert-success">{{ session('success') }}</div>
@endif --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Breed</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Description</th>
                <th scope="col">catOwner</th>

              </tr>
            </thead>
            <tbody>
              @foreach ( $cats as $cat)
                <tr>
                  <th scope="row">{{ $cat->id }}</th>
                  <td>{{ $cat->name }}</td>
                  <td>{{ $cat->breed }}</td>
                  <td>{{ $cat->gender }}</td>
                  <td>{{ $cat->age}}</td>
                  <td>{{ $cat->details}}</td>
                  <td>{{ $cat->user_id}}</td>


                  <td><a href="{{ route('cat.edit',$cat->id) }}" class="btn btn-outline-dark fa fa-edit">edit</a></td>

                    <td>

                        <form action="{{ route('cat.delete',$cat->id) }}" method="DELETE" class="delete" data-title="{{ $cat->name }}" data-body="Wollen Sie die cat <strong> {{ $cat->name}}</strong> löschen!">
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
