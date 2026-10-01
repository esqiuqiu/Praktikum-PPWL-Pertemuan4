@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Project</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">+ Tambah Project</a>
    </div>

    @if(count($projects) > 0)
        <div class="list-group">
            @foreach($projects as $project)
                <div class="list-group-item mb-2">
                    <h3>
                        <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
                    </h3>
                    <small class="text-muted">Tanggal: {{ $project->created_at }}</small>
                </div>
            @endforeach
        </div>
    @else
        <p>Belum ada data project.</p>
    @endif
</div>
@endsection