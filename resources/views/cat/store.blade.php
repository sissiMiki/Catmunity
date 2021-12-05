@extends('layouts.main')
@section('pageTitle','cat')
@section('content')

       <div class="button"><a href="{{ route('cat.index') }}" class="btn btn-outline-secondary">Alle catem</a></div>
        <h1>{{ $cat->title }}</h1>
        <p>
            <small>erzeugt am: {{ $cat->created_at->format('d.m.Y H:i:s') }}</small>
            <br>
            <small>geändert am: {{ $cat->updated_at->format('d.m.Y H:i:s') }}</small>
        </p>
        <p>{{ $cat->body ? $cat->body : 'keine Beschreibung vorhanden!' }}</p>


@endsection
