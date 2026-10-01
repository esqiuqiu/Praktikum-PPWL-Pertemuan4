@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section>
        <h1>Halo, saya  Esqii</h1>

        <p>
            Selamat datang di website portfolio saya.
            Saya adalah seorang mahasiswa yang sedang belajar
            pengembangan web.
        </p>

        <a href="{{ route('about') }}">Tentang Saya</a>
        <a href="{{ route('projects') }}">Lihat Project</a>
    </section>

@endsection