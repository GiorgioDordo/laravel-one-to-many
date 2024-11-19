
@extends("layouts.app")

@section("page-title", "Create Project")

@section("content")
<main class="container d-flex justify-content-center">
    <div>
        <div class="card-title">
            <h1>CREA PROGETTO</h1>
        </div>
        <div class="card-body">
            <form action="{{route('projects.store')}}" method="POST">
                <div class="row d-flex flex-column">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="type">Type</label>
                        <select class="form-select" name="type" id="type" aria-label="Default select example">
                            <option value="1">Full-Stack</option>
                            <option value="2">Front-End</option>
                            <option value="3">Back-End</option>
                            <option value="4">Database</option>
                        </select>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea type="text" class="form-control" id="short_description" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="url" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-success">CREA</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
