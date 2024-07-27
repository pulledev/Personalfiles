@extends('layouts.base')
@section('title', 'Register')
@section('body')
    <div class="container">

        <h3>Registrierung</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-success">
                {{session()->get("error")}}
            </div>
        @endif

        <form method="POST" action="{{route('register.post')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nutzername</label>
                <input type="text" class="form-control" name="user" id="user" aria-describedby="userHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Registrieren</button>
        </form>

    </div>
@endsection
