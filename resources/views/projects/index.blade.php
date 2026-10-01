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
                <div class="list-group-item d-flex justify-content-between align-items-center mb-2 shadow-sm rounded">
                    <div>
                        <h4 class="mb-1">
                            <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none fw-bold">
                                {{ $project->title }}
                            </a>
                        </h4>
                        <small class="text-muted">Dibuat: {{ $project->created_at->format('d M Y H:i') }}</small>
                    </div>
                    <div>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        
                        {{-- Form Delete dengan Method Spoofing & JS Confirm --}}
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Belum ada data project.</div>
    @endif
</div>
@endsection