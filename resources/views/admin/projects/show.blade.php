@extends('layouts.admin')

@section('content')

    <h1>{{$project->name}}</h1>
    <div class="show-contain overflow-scroll">
        <p>{{$project->description}}</p>
        <img src="{{ asset('storage/' . $project->cover_image) }}">

        @if (count($project->languages))
        @foreach ($project->languages as $languages)
        <div>{{$languages->name}}</div>
        @endforeach
            
        @endif
    </div>
   

@endsection