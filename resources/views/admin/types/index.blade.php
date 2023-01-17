@extends('layouts.admin')
@section('content')
    <h1>Type</h1>
    <a class="btn btn-success" href="{{ route('admin.types.create') }}">Create new type</a>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Workflow</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td><a href="{{ route('admin.types.show', $type->slug) }}"
                                title="View Post">{{ $type->workflow }}</a></td>
                        <td><a class="" href="{{ route('admin.types.edit', $type->slug) }}" title="Edit Post"><i
                                    class="pt-2 fa-solid fa-pen"></i></a></td>
                        <td>
                            <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $type->workflow }}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.admin.modal-delete')
@endsection
