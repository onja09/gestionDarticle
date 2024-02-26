@extends('layout.app')

@section('content')
    <div class="blocapropos">
        <div class="sousblocpro">
            <div class="apropos blocaffichage">
                <h1>A propos</h1>
                <div class="info">
                    @forelse ($personnels as $personnel)
                        <h2>{{ $personnel->soustitre }}</h2>
                        <p>{{ $personnel->histoire }}</p>
                    @empty
                        <p>Cette plateforme a pour but de gérer les articles personnels et de les partager avec tous les
                            membres
                            du
                            groupe</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit sunt odio perferendis
                            consectetur
                            excepturi minus aliquam minima enim ducimus cupiditate quam, ex rem beatae animi esse
                            provident
                            iure
                            possimus voluptatum.Hic ad illo fugit eius voluptatum quidem fuga labore vero explicabo
                            velit
                            nemo,
                            aliquam debitis deleniti autem est! Molestiae magnam reprehenderit repudiandae perspiciatis
                            fuga.
                            Iste
                            repellat voluptas nam blanditiis obcaecati!</p>
                    @endforelse
                </div>
                <a href="/gestion">tous articles</a>
            </div>
            <div class="blocmembre blocaffichage">
                <h1>Membre du groupe</h1>
                <div class="membre">
                    @foreach ($personnes as $personne)
                        <a href="/showperso/{{ $personne->id }}">
                            <div class="toutmembre">
                                @auth
                                    @if (Auth::id() === $personne->id)
                                        <div class="span"></div>
                                        <div class="spanperso"></div>
                                    @endif
                                @endauth
                                <div class="imaperso">
                                    <div class="imaboxperso">
                                        <img src="/storage/{{ $personne->photo }}" alt="">
                                    </div>
                                </div>
                                <h3>{{ $personne->name }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
