@extends('layouts.admin')

@section('content')
    <h1>Edit Project: {{ $project->name }}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data"
                class="p-4">
                @csrf
                @method('PUT')
                <div class="d-flex mt-4">
                    <div class="media me-4">
                        <img class="" width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->title }}">
                    </div>
                    <div class="mb-2">
                        <label for="cover_image" class="form-label">
                            Upload image</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $project->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="languages">Languages</label>
                            @foreach ($languages as $language)
                                <input type="checkbox" name="languages[]" value="{{ $language->id }}">
                                <span class="text-capitalize">{{ $language->name }}</span>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="framework" class="form-label">Framework</label>
                            <input type="text" class="form-control @error('dev_framework') is-invalid @enderror"
                                id="framework" name="framework" value="{{ old('framework', $project->framework) }}">
                            @error('framework')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="diff_lvl" class="form-label">Livello di difficoltà</label>
                            <input type="text" class="form-control @error('diff_lvl') is-invalid @enderror"
                                id="diff_lvl" name="diff_lvl" value="{{ old('diff_lvl"', $project->diff_lvl) }}">
                            @error('diff_lvl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="team" class="form-label">Team</label>
                            <input type="text" class="form-control @error('team') is-invalid @enderror" id="team"
                                name="team" value="{{ old('team"', $project->team) }}">
                            @error('team')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="git_link" class="form-label">Link Git</label>
                            <input type="text" class="form-control @error('git_link') is-invalid @enderror"
                                id="git_link" name="git_link" value="{{ old('git_link', $project->git_link) }}">
                            @error('git_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Select workflow</label>
                            <select name="type_id" id="type_id"
                                class="form-control @error('type_id') is-invalid @enderror">
                                <option value="">Select workflow</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->workflow }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Replace project image</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div> --}}
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class=" w-50 me-3 btn btn-success">Submit</button>
                            <button type="reset" class="w-50 me-3 btn btn-danger">Reset</button>
                            <button class="w-50 btn btn-primary"><a
                                    href="{{ route('admin.projects.index') }}"style="color:white">Indietro</a></button>
                        </div>
            </form>
        </div>
    </div>
@endsection
