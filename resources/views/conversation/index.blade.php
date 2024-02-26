@extends('layout.app')

@section('content')
    <div class="blocconversation">
        <div class="conversation">
            @include('conversation.users', ['users' => $users, 'unread' => $unread])
            <div class="blocslide">
                <div class="soublocslide">
                    <div class="slide">
                        @foreach ($personnes as $personne)
                        <div class="blocphoto">
                            <img src="/storage/{{ $personne->photo }}" alt="">
                            <h1>{{ Auth::id() === $personne->id ? 'Moi' : $personne->name }}</h1>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="soublocslide1">
                    <div class="slide1">
                        @foreach ($personnes as $personne)
                        <div class="blocphoto">
                            <img src="/storage/{{ $personne->photo }}" alt="">
                            <h1>{{ Auth::id() === $personne->id ? 'Moi' : $personne->name }}</h1>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('conversation.description', ['users' => $users])
        </div>
    </div>
    <script src="{{ asset('js/conversation.js') }}"></script>
@endsection
