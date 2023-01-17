@extends('layouts.admin')

@section('content')
    <h1>Create Project</h1>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="workflow" class="form-label">Workflow name</label>
                    <input type="text" class="form-control @error('workflow') is-invalid @enderror" id="workflow"
                        name="workflow">
                    @error('workflow')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button class="btn btn-primary"><a
                        href="{{ route('admin.types.index') }}"style="color:white">Indietro</a></button>
            </form>
        </div>
    </div>
@endsection
