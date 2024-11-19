
@extends("layouts.app")

@section("page-title", "Create Project")

@section("content")
<main class="container d-flex justify-content-center">
    <div>
        <div class="card-title">
            <h1>CREA PROGETTO</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.projects.store')}}" method="POST">
                @csrf
                <div class="row d-flex flex-column">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="progetto">
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="type_id">Type</label>
                        <select class="form-select" name="type_id" id="type_id" aria-label="Default select example">
                            <option value="">Selezione il tipo di progetto</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea type="text" name="short_description" class="form-control" id="short_description" rows="2"></textarea>
                    </div>

                    <div class="col mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" id="description" rows="4"></textarea>
                    </div>

                    <div class="col mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="url" name="image" class="form-control" id="image">
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
