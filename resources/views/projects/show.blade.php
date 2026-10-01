@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1>{{ $project->title }}</h1>
    <small class="text-muted">Tanggal: {{ $project->created_at }}</small>
    <hr>
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection