@extends('layout.app')

@section('content')
    
<div class="bloccontainer">
    <div class="container">
        <h1>Bienvenu {{Auth::user()->name }}</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id, ipsa natus fugit, quidem perferendis pariatur, reprehenderit aliquid ducimus harum atque molestias quis! Dolores nemo pariatur doloribus, nesciunt officia blanditiis animi.</p>
        <a href="/gestion">Gestion d'article</a>
    </div>
</div>

@endsection