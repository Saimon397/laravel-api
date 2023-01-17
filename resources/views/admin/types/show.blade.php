@extends('layouts.app')
@section('content')
    <div class="text-center mt-5">
        <h1>{{ $type->workflow }}</h1>
        <ul>
            @foreach ($type->projects as $project)
                <li class="list-unstyled">{{ $project->title }}</li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-3"><a href="{{ route('admin.types.index') }}"
                class="text-white">Indietro</a></button>
    </div>
@endsection
