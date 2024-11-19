
@extends("layouts.app")

@section("page-title", "Projects")

@section("content")
<main class="container">
    <div class="row d-flex justify-content-center">
        <div><h1 class="text-center">PROJECTS</h1></div>
        <h4 class="text-center"><a class="text-decoration-none text-black" href="{{route('admin.projects.create')}}">CREA PROGETTO</a></h4>
        @foreach ($projects as $index => $project)
        <div class="col-3 m-3 p-3 card">
            <div class="card-body">
                <p><strong><a class="text-decoration-none text-black" href="{{Route("admin.projects.show",$project->id)}}">{{$project->name}}</a></strong></p>
                <p>{{$project->type->name}}</p>
                <p>{{$project->short_description}}</p>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
