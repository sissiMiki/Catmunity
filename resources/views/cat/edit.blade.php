@extends('layouts.main')
@section('pageTitle','edit cat')
@section('content')
        <h1>{{ $cat->title }} ändern</h1>
        <div class="button"><a href="{{ route('cat.index') }}" class="btn btn-outline-secondary">Cats</a></div>

        <div id="form" class="form">
            <form action="{{ route('cat.update',$cat->id) }}" method="POST">
               @csrf
               @method('PUT')
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title',$cat->title) }}">
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="body">Beschreibung</label>
                  <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3">{{ old('body',$cat->body) }}</textarea>
                  @error('body')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-dark">ändern</button>
              </form>
        </div>
@endsection
