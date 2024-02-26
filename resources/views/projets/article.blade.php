@extends('layout.app')

@section('content')
    <div class="blocarticle">
        <div class="article">
            <h1>Gestion d'article personnel</h1>
            <div class="showgestion">
                {{-- @if (session()->has('success'))
                    <h2 class="success">{{ session()->get('success') }}</h2>
                @endif --}}
                <div class="blocangle1">
                    <a href="#" class="angleup1"><i class="fas fa-angle-up"></i></a>
                    <a href="#" class="angledown1"><i class="fas fa-plus"></i><span class="overin">Ajouter vos
                            articles</span></a>
                </div>
                <div class="blocangle2">
                    <a href="#" class="angleup2"><i class="fas fa-angle-up"></i></a>
                    <a href="#" class="angledown2"><i class="fas fa-plus"></i><span class="overin">Ajouter vos
                            articles</span></a>
                </div>
            </div>
            <div class="blocformarticle">
                <form class="formarticle" action="/projet" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="blocform">
                        <div class="blocinput">
                            <label for="titre">Titre</label>
                            @error('titre')
                                <p>{{ $message }}</p>
                            @enderror
                            <input type="text" name="titre">
                        </div>
                        <div class="blocinput">
                            <label for="description">Description</label>
                            @error('description')
                                <p>{{ $message }}</p>
                            @enderror
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
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
                        <button type="submit">Affichier</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="blocaffichage">
            <h1>tous les articles</h1>
            <div class="affichage">
                @forelse ($projets as $projet)
                    <div class="toutarticle">
                        <div class="sup">
                            @auth
                                @if (Auth::id() === $projet->user_id)
                                    <a href="/showedit/{{ $projet->id }}" class="btnedit"><i class="fas fa-edit"></i><span
                                            class="articlemodif">Modifier</span></a>
                                    <form action="/deleteprojet/{{ $projet->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">x<span class="articlesup">supprimer</span></button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <div class="blocimage">
                            <div class="imbox">
                                <img src="storage/{{ $projet->image }}" alt="image">
                            </div>
                        </div>
                        <h2 {{ $projet->id }}>{{ $projet->titre }}</h2>
                        <p>
                            <i class="longpar">
                                {{ $projet->description }}
                                <span class="showsuite">...suite</span>
                            </i>
                        </p>
                    </div>
                @empty
                    <p>Aucun fichier...</p>
                @endforelse

            </div>
        </div>
    </div>
    {{-- <div class="link">
        {{ $projets->links() }}
    </div> --}}
@endsection
