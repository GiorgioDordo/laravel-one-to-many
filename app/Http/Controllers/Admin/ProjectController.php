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
        // Todo: validami i dati e restituiscimi tutti i campi validati
        $formData = $request->validate([
            'name' => 'required|string|unique:projects|', // required = obblogatoria, deve essere di tipo stringa, il nome deve essere unico
            'type_id' => 'required|string',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|url:http,https',
        ]);

        $project = new Project();

        // $project->name = $formData['name'];
        // $project->type_id = $formData['type_id'];
        // $project->short_description = $formData['short_description'];
        // $project->description = $formData['description'];
        // $project->image = $formData['image'];

        // Todo: posso prendere i dati uno ad uno oppure utilizzare il fill.
        $project->fill($formData);
        $project->type_id = $formData['type_id'];
        $project->slug = Str::slug($project->name);
        $project->save();

        // Todo: altro modo per prendere i dati tramite create, create ha il fill incluso e salva in automatico.
        // $formData["slug"] = Str::slug($formData["name"]);
        // $project->type_id = $formData['type_id'];
        // Project::create($formData);

        // Todo: si puo scrivere anche solo to_route invece di redirect()->route.
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