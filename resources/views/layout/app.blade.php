<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href={{ asset('css/bootstrap.min.css')}}> --}}
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/all.css') }}>
    <title>Gestion d'article</title>
    @yield('script')
</head>

<body>
    <header>
        <div class="logo">
            <h1>G<span>A</span></h1>
        </div>
        @auth
            <ul class="list1">
                <li><a href="/accueil" class="items items1">Accueil</a></li>
                <li><a href="/apropos" class="items items2">A propos</a></li>
                <li><a href="/blog" class="items items3">Blog</a></li>
                <li><a href="/conversation" class="items items3">Conversation</a></li>
                {{-- <li><a href="#" class="dec"><i class="fas fa-user"></i></a></li> --}}
                <li><a href="#" class="dec"><img src="/storage/{{Auth::user()->photo }}" alt="image"></a></li>
            </ul>
            <div class="blocdec">
                <div class="confirmdec">
                    <h3>vouliez-vous vraiment sedéconnecter</h3>
                    <div class="blocbuttondec">
                        <a href="/logout" class="ouibtn">oui</a>
                        <a href="#" class="nonbtn">non</a>
                    </div>
                </div>
            </div>
        @else
            <ul class="list2">
                <li><a href="/inscription" class="inscription">Sing'Up</a></li>
                <li><a href="/connexion" class="connexion">Sing'In</a></li>
            </ul>

        @endauth
    </header>

    @yield('content')

    <script src={{ asset('js/all.js') }}></script>
    <script src={{ asset('js/all.min.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>
</body>

</html>
