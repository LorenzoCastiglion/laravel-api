@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-content-center align-items-center">
        <h1>Workflows</h1>
        <div class="text-end">
            <a class="btn btn-success" href="{{route('admin.types.create')}}">Crea nuova categoria</a>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Workflow</th>
            
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
                <tr>
                    <th scope="row">{{$type->id}}</th>
                    <td><a href="{{route('admin.types.show', $type->slug)}}" title="View Ctegory">{{$type->workflow}}</a></td>
                    
                    <td><a class="link-secondary" href="{{route('admin.types.edit', $type->slug)}}" title="Edit Workflow"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$type->workflow}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection
