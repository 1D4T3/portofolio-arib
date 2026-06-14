<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $imageName = null;

        if($request->hasFile('image')){
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imageName
        ]);

        return redirect('/projects')->with('success', 'Proyek berhasil ditambahkan.');

        // return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function show($id){
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function edit($id){
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $project = Project::findOrFail($id);

        if($request->hasFile('image')){
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'image' => $imageName
            ]);
        } else {
            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category
            ]);
        }

        return redirect('/projects')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects')->with('success', 'Proyek berhasil dihapus.');
    }

}
