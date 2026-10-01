<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 1. Menampilkan daftar project
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // 2. Menampilkan form tambah project
    public function create()
    {
        return view('projects.create');
    }

    // 3. Menyimpan project baru + Validasi + Flash Message
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|min:5|max:200',
            'description' => 'required|min:10',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil ditambahkan!');
    }

    // 4. Menampilkan detail project
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    // 5. Menampilkan form edit project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    // 6. Memperbarui data project + Validasi + Flash Message
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'       => 'required|min:5|max:200',
            'description' => 'required|min:10',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil diperbarui!');
    }

    // 7. Menghapus project + Flash Message
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus!');
    }
}