@extends('layout.app')

@section('content')
<div class="bloc">

    @if (session()->has('error'))
            <h2>{{session()->get('error')}}</h2>
        @endif

    <form action="/singin" method="POST">
        @method('post')
        @csrf
        <div class="blocform">
            <div class="logo">
                <h1>G<span>A</span></h1>
            </div>
        <div class="blocinput">
            <label for="email">Email</label>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" name="email" value={{old('email')}}>
        </div>
        <div class="blocinput">
            <label for="password">password</label>
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <input type="password" name="password">
        </div>
    
        <div class="blocbutton">
            <button type="submit">Sing'In</button>
        </div>

    </div>
    </form>
</div>
@endsection