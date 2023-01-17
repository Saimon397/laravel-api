@extends('layouts.admin')

@section('content')
    <h1>Edit Type: {{ $type->workflow }}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.types.update', $type->slug) }}" method="POST" enctype="multipart/form-data"
                class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="workflow" class="form-label">Workflow name</label>
                    <input type="text" class="form-control @error('workflow') is-invalid @enderror" id="workflow"
                        name="workflow" value="{{ old('workflow', $type->workflow) }}">
                    @error('workflow')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button class="btn btn-primary"><a
                            href="{{ route('admin.types.index') }}"style="color:white">Indietro</a></button>
                </div>
        </div>
    </div>
    </form>
@endsection
