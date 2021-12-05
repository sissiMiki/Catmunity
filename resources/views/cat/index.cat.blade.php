@extends('layouts.main')
@section('pageTitle','cat')
@section('content')
        <h1>cat</h1>
        <div class="button"><a href="{{ route('cat.create') }}" class="btn btn-outline-secondary">New cat</a></div>
{{--     @if( session('success') )
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Beschreibung</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $cats as $cat)
                <tr>
                  <th scope="row">{{ $cat->id }}</th>
                  <td>{{ $cat->title }}</td>
                  {{-- <td><a href="/cat/{{ $cat->id }}" class="btn btn-outline-dark fa fa-eye"></a></td> --}}
                  <td><a href="{{ route('cat.show',$cat->id) }}" class="btn btn-outline-dark fa fa-eye"></a></td>
                  <td><a href="{{ route('cat.edit',$cat->id) }}" class="btn btn-outline-dark fa fa-edit"></a></td>
                  <td>
                      @if( $cat->mitarbeiter_count < 1 )
                        <form action="{{ route('cat.destroy',$cat->id) }}" method="POST" class="delete" data-title="{{ $cat->title }}" data-body="Wollen Sie die cat <strong> {{ $cat->title }}</strong> löschen!">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger fa fa-trash"></button>
                        </form>
                      @endif
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
