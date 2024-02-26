@extends('layout.app')

@section('content')
    <div class="bloc">
        @if (session()->has('success'))
            <h2 class="success">{{session()->get('success')}}</h2>
        @endif
        <form action="/singup" method="POST" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="blocform">
                <div class="logo">
                    <h1>G<span>A</span></h1>
                </div>
                <div class="blocinput">
                    <label for="nom">Name</label>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="text" name="name">
                </div>
                <div class="blocinput">
                    <label for="email">Email</label>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                    <input type="text" name="email">
                </div>
                <div class="blocinput">
                    <input type="hidden" value="ward.png" name="photo">
                </div>
                <div class="blocinput">
                    <label for="password">password</label>
                    <input type="password" name="password">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="blocinput">
                    <label for="confirmpass">Confirm password</label>
                    <input type="password" name="confirmpass">
                </div>
                <div class="blocbutton">
                    <button type="submit">Sing'up</button>
                </div>

            </div>
        </form>
    </div>
@endsection
