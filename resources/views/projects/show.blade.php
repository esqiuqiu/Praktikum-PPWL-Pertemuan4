@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $project->title }}</h1>
            <p class="text-muted small">Dibuat pada: {{ $project->created_at->format('d M Y H:i') }}</p>
            <hr>
            <p class="card-text fs-5" style="white-space: pre-line;">{{ $project->description }}</p>
            
            <div class="mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning text-white">Edit</a>
                
                {{-- Form Delete --}}
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection