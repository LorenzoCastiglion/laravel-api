@extends('layouts.admin')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success mb-3 mt-3">
    {{ session()->get('message') }}
</div>
@endif

    <div class="d-flex justify-content-between align-content-center align-items-center">
        <h1>Coding Languages</h1>
       
    </div>

    
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $type)
                <tr>
                    <th scope="row">{{$type->id}}</th>
                   
                    <th scope="row">{{$type->name}}</th>
                    <td>
                        <form action="{{route('admin.languages.destroy', $type->slug)}}" method="POST">
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
