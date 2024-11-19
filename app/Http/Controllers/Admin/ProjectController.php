<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(Type::all()->pluck("id"));
        $projects = Project::all();
        return view("admin.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();
        return view("admin.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        $project = new Project();

        $project->name = $formData['name'];
        $project->type_id = $formData['type_id'];
        $project->short_description = $formData['short_description'];
        $project->description = $formData['description'];
        $project->image = $formData['image'];
        $project->slug = Str::slug($project->name);
        $project->save();

        return redirect()->route("admin.projects.show", $project->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // $project = Project::findOrFail($id);
        return view ("admin.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}