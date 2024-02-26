@extends('layout.app')

@section('content')
    <div class="blocperso">
        <div class="perso">
            <div class="aproperso">
                <div class="blocima">
                    <div class="boxima">
                        <img src="/storage/{{ $personne->photo }}" alt="photo">
                    </div>
                    @auth
                        @if (Auth::id() === $personne->id)
                            <a href="#" class="showeditima"><i class="fas fa-camera"></i></a>
                        @endif
                    @endauth
                </div>
                <p class="thisname">
                    <span>{{ $personne->name }}</span>
                </p>
                @auth
                    @if (Auth::id() === $personne->id)
                        <p class="blocemail"><span>Email : </span>{{ $personne->email }} <a href="#" class="clickemail"><i
                                    class="far fa-edit"></i></a></p>

                        <div class="changeima">

                            <form action="/updatestore/{{ $personne->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="blocinput">
                                    <input type="hidden" name="name" value="{{ $personne->name }}">
                                    <input type="hidden" name="email" value="{{ $personne->email }}">
                                    <div class="blocinputfile">
                                        <input type="file" name="photo" class="photo" required>
                                        <span class="btnfile"><i class="fas fa-user"></i></span>
                                        <span class="title">choisir un photo</span>
                                    </div>
                                    <button type="submit" class="valider">valider</button>
                                </div>
                            </form>
                            <a href="#" class="delete"><i class="fas fa-times"></i></a>
                        </div>

                        <div class="creerapropos">

                            <form action="/aproposperso" method="POST">
                                @method('post')
                                @csrf
                                <h1>A propos de vous</h1>
                                <div class="blocinput">
                                    <input type="text" name="soustitre">
                                    <span>titre de l'histoire</span>
                                </div>
                                <div class="blocinput">
                                    <textarea name="histoire"></textarea>
                                    <span>Votre histoire</span>
                                </div>
                                <div class="blocinput">
                                    <button type="submit">creer</button>
                                </div>
                            </form>
                            <a href="#" class="delete3"><i class="fas fa-times"></i></a>
                        </div>

                        <a href="#" class="angledown1 creerpos">
                            <i class="fas fa-plus"></i><span class="overin">Ajouter apropos</span>
                        </a>

                        <div class="change_email">
                            <form action="/updatemail/{{ $personne->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <h3>Modification</h3>
                                <div class="blocinput">
                                    <input type="text" name="name" value="{{ $personne->name }}">
                                    <input type="email" name="email" value="{{ $personne->email }}">
                                    <input type="hidden" name="photo" value="{{ $personne->photo }}">
                                </div>
                                <button type="submit" class="valider">valider</button>
                            </form>
                            <a href="#" class="delete2"><i class="fas fa-times"></i></a>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="infosperso">
                <div class="soustitre">
                    <h1>A propos personnel</h1>
                </div>
                    <div class="thispersonnel">
                        @forelse ($personnels as $personnel)
                            <h2>{{ $personnel->soustitre }}</h2>
                            <p>{{ $personnel->histoire }}</p>
                        @empty
                            <h2>sous_titre</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio ex quod ea incidunt ipsum.
                                Quod,
                                harum exercitationem cumque ad cum eaque velit maxime dolorum delectus, molestiae aliquam
                                laudantium, atque mollitia.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio ex quod ea incidunt ipsum.
                                Quod,
                                harum exercitationem cumque ad cum eaque velit maxime dolorum delectus, molestiae aliquam
                                laudantium, atque mollitia.
                            </p>
                        @endforelse
                    </div>
            </div>

        </div>
        <div class="logo">
            <h1>G<span>A</span></h1>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
