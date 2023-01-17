@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                {{-- <div class="mb-3">
                    <label for="dev_lang" class="form-label">Used Dev Languages</label>
                    <input type="text" class="form-control @error('dev_lang') is-invalid @enderror" id="dev_lang"
                        name="dev_lang">
                    @error('dev_lang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="framework" class="form-label">Frameworks</label>
                    <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework"
                        name="framework">
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team Members</label>
                    <input type="text" class="form-control @error('team') is-invalid @enderror" id="team"
                        name="team">
                </div>
                <div class="mb-3">
                    <label for="git_link" class="form-label">GitHub Link</label>
                    <input type="text" class="form-control @error('git_link') is-invalid @enderror" id="git_link"
                        name="git_link">
                </div>
                <div>
                    <label for="diff_lvl">Perceived difficulty at that time</label>
                    <select name="diff_lvl" class="form-control @error('diff_lvl') is-invalid @enderror">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    @error('diff_lvl')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control  @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- workflow type --}}
                <div class="mb-3">
                    <label for="type_id" class="form-label">Seleziona workflow</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                        <option value="">Seleziona workflow</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                {{ $type->workflow }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- languages --}}
                <label for="languages">Code Languages</label>
                @foreach($languages as $language)
                <input type="checkbox" name="languages[]" value="{{$language->id}}" id="languages" > <span class=" text-capitalize">{{$language->name}}</span>
                @endforeach
<br>

                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
