@extends('layouts.app')
@section('pageTitle','cat.store')
@section('content')

       <div class="button"><a href="{{ route('cat.index') }}" class="btn btn-outline-secondary">cats</a></div>
        <h1>{{ $cat->name }}</h1>
        <p>
            <small>created: {{ $cat->created_at->format('d.m.Y H:i:s') }}</small>
            <br>
            <small>updated: {{ $cat->updated_at->format('d.m.Y H:i:s') }}</small>
        </p>
        <p>{{ $cat->name ? $cat->description : 'no description' }}</p>


@endsection
