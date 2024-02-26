@extends('layout.app')

@section('content')
    <div class="blocconversation">
        <div class="conversation">
            @include('conversation.users', ['users' => $users, 'unread' => $unread])
            <div class="blocallconversation">
                <div class="allconversation">
                    <div class="destinateur">
                        <div class="imaperso">
                            <div class="imaboxperso">
                                <img src="/storage/{{ $user->photo }}" alt="">
                            </div>
                        </div>
                        <h3>{{ $user->name }}</h3>
                    </div>
                    <div class="inconversation">
                        <div class="blocmessitems">
                        <div class="flexend">

                            @if ($messages->previousPageUrl())
                                <div class="suivantmess">
                                    <a href="{{ $messages->previousPageUrl() }}">voir les messages suivants</a>
                                </div>
                            @endif
                            @foreach ($messages as $message)
                                <div class="blocmess {{ $message->from->id !== $user->id ? 'thismess' : '' }}">
                                    <p class="mess {{ $message->from->id === $user->id ? 'backmess' : '' }}">
                                        <strong>{{ $message->from->id !== $user->id ? 'Moi' : $message->from->name }}</strong>
                                        <br>
                                        {{ $message->content }}
                                    </p>
                                </div>
                            @endforeach
                            @if ($messages->hasMorePages())
                                <div class="suivantmess">
                                    <a href="{{ $messages->nextPageUrl() }}">voir les messages précédents</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="formulaire">
                        <form action="" method="post">
                            @csrf;
                            @method('post')
                            <div class="bloctextarea">
                                <Textarea name="content" placeholder="Ecrivez votre message" required></Textarea>
                            </div>
                            <div class="blocbutton">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            @include('conversation.description', ['users' => $users])
        </div>
    </div>
@endsection
