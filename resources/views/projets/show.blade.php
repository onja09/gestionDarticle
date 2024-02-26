@extends('layout.app')

@section('content')
    <div class="bloc blocedit">
        <form action="/update/{{ $projet->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h3>Modification</h3>
            <div class="blocform">
                <div class="blocinput">
                    <label for="titre">Titre</label>
                    @error('titre')
                        {{ $message }}
                    @enderror
                   <textarea name="titre" id="input">{{ $projet->titre }}</textarea>
                </div>
                <div class="blocinput">
                    <label for="description">Description</label>
                    @error('description')
                        {{ $message }}
                    @enderror
                    <textarea name="description" id="description" cols="30" rows="10">{{ $projet->description }}</textarea>
                </div>
                <div class="blocinput">
                    <label for="image">Image</label>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="blocinputfile">
                        <input type="file" name="image">
                        <span class="btnfile">choisir</span>
                    </div>
                </div>
            </div>
            <div class="blocbutton">
                <button type="submit">Modifier</button>
            </div>
    </div>
    </form>
    </div>
@endsection
