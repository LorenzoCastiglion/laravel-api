@extends('layouts.admin')

@section('content')

@if (session()->has('message'))
<div class="alert alert-success mb-3 mt-3">
    {{ session()->get('message') }}
</div>
@endif
    <div class=" d-flex justify-content-between my-4 align-content-center align-items-center">
        <h1 class=" text-uppercase m-0">Projects</h1>
        <a class="btn btn-success align-self-end" href="{{ route('admin.projects.create') }}">Crea nuovo project</a>
       
        
    </div>
    <div class="table-responsive">
        
        <table  class="table table-striped table-bordered table-sm">
            <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Difficulty</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
        
                <tbody >
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td><a href="{{ route('admin.projects.show', $project->slug) }}"
                                    title="View project">{{ $project->name }}</a></td>
                            <td>{{ Str::limit($project->description, 100) }}</td>
                            <td class="text-center">{{$project->diff_lvl}}</td>
                            <td class="text-center"><a class="link-secondary" href="{{ route('admin.projects.edit', $project->slug) }}"
                                    title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                            <td >
                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3 "
                                        data-item-title="{{ $project->name }}"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        
        </table>
       {{$projects->links('vendor.pagination.bootstrap-5')}}
    </div>

    @include('partials.admin.modal-delete')
@endsection



