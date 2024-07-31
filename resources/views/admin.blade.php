@extends('layouts.base')
@section('title', 'Administration')

@section('body')
    <div class="container">
        <h1>Administration</h1>
        <hr>

        @if(session()->has("msg"))
            <div class="alert alert-info">
                {{session()->get("msg")}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

        @component('components.modal', ['title'=>'Eintragtyp erstellen', 'button' => 'Eintragtyp erstellen', 'name' => 'entryType'])
            <form method="POST" action="{{route('admin.post')}}">
                @csrf
                <input type="hidden" name="form_type" value="entryType">
                <div class="mb-3">
                    <label for="entry" class="form-label">Name des neuen Eintragtyps</label>
                    <input type="text" class="form-control" name="entryName" id="entry" aria-describedby="userHelp">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Farbe</label>
                    <input type="color" class="form-control" name="color" id="user" aria-describedby="userHelp" value="#ffffff">
                </div>
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>
        @endcomponent

        @component('components.modal', ['title'=>'Ausbildungstyp erstellen', 'button' => 'Ausbildungstyp erstellen', 'name' => 'educations'])
            <form method="POST" action="{{route('admin.post')}}">
                @csrf
                <input type="hidden" name="form_type" value="educations">
                <div class="mb-3">
                    <label for="entry" class="form-label">Name der neuen Ausbildung</label>
                    <input type="text" class="form-control" name="educationName" id="entry" aria-describedby="userHelp">
                </div>

                <div class="mb-3">
                    <label for="Text" class="form-label">Kurze Inhaltsbeschreibung</label>
                    <textarea class="form-control" placeholder="" id="floatingTextarea2" name="educationDescription" style="height: 100px">asdf</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>                    <input type="text" name="educationDescription">
        @endcomponent

        @component('components.modal', ['title'=>'Einheit erstellen', 'button' => 'Mitglied erstellen', 'name' => 'member'])
            <form method="POST" action="{{route('admin.post')}}">
                @csrf
                <input type="hidden" name="form_type" value="personal">

                <div class="mb-3">
                    <label for="user" class="form-label">Name des neuen Mitglieds</label>
                    <input type="text" class="form-control" name="name" id="user" aria-describedby="userHelp">
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label">Einheit</label>
                    <select class="form-select" id="unit" name="unitId" aria-label="Default select example">

                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->unitName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="rank" class="form-label">Rang</label>
                    <select class="form-select" id="rank" name="rankId" aria-label="Default select example">
                        @foreach($ranks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->rankName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isStab" value="0" id="stab">
                    <label class="form-check-label" for="stab">
                        Stabsmitglied
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>
        @endcomponent
    </div>
@endsection
