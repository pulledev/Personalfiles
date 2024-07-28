@extends('layouts.base')
@section('title', 'Administration')

@section('body')
    <div class="container">
        <h1>Administration</h1>
        <hr>
        @component('components.modal', ['title'=>'Rang erstellen', 'button' => 'Rang erstellen', 'name' => 'rank'])
            <form method="POST" action="{{route('admin.post')}}">
                @csrf
                <input type="hidden" name="form_type" value="rank">
                <div class="mb-3">
                    <label for="user" class="form-label">Name des neuen Ranges</label>
                    <input type="text" class="form-control" name="rankName" id="user" aria-describedby="userHelp">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Farbe</label>
                    <input type="color" class="form-control" name="color" id="user" aria-describedby="userHelp" value="#ffffff">
                </div>
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>
        @endcomponent

        @component('components.modal', ['title'=>'Einheit erstellen', 'button' => 'Einheit erstellen', 'name' => 'unit'])
            <form method="POST" action="{{route('admin.post')}}">
                @csrf
                <input type="hidden" name="form_type" value="unit">
                <div class="mb-3">
                    <label for="user" class="form-label">Name der neuen Einheit</label>
                    <input type="text" class="form-control" name="unitName" id="user" aria-describedby="userHelp">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Farbe</label>
                    <input type="color" class="form-control" name="color" id="user" aria-describedby="userHelp" value="#ffffff">
                </div>
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>
        @endcomponent


    </div>
@endsection
