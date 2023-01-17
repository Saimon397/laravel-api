@extends('layouts.admin')

@section('content')
    <h1>Projects</h1>
    <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Languages</th>
                <th scope="col">Framework</th>
                <th scope="col">Team</th>
                <th scope="col">Link Git</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Workflow</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td><a href="{{ route('admin.projects.show', $project->slug) }}"
                            title="View Post">{{ $project->name }}</a></td>
                    <td>{{ Str::limit($project->description, 100) }}</td>
                    @if (count($project->languages))
                        @foreach ($project->languages as $language)
                            <td>{{ $language->name }}</td>
                        @endforeach
                    @endif
                    <td>{{ $project->framework }}</td>
                    <td>{{ $project->team }}</td>
                    <td>{{ $project->git_link }}</td>
                    <td>{{ $project->diff_lvl }}</td>
                    @if ($project->type)
                        <td>{{ $project->type->workflow }}</td>
                    @else
                        <td>//</td>
                    @endif
                    <td><a class="link-secondary" href="{{ route('admin.projects.edit', $project->slug) }}"
                            title="Edit Post"><i class="pt-2 fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $project->name_project }}"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection
