@extends('layouts.admin')

@section('content')

    <h1>{{$type->workflow}}</h1>
    <ul>
        @foreach ($type->projects as $project)
            <li>{{$project->name}}</li>
        @endforeach
    </ul>


@endsection