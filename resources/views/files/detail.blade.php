@extends('layouts.base')
@section('title', 'Aktenansicht')
@section('body')
    <style>
        .profile-header {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .profile-header img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 20px;
        }
        .profile-header h2 {
            margin: 0;
            font-size: 1.5em;
            color: #343a40;
        }
        .profile-header p {
            margin: 0;
            font-size: 1.1em;
            color: #6c757d;
        }
        .profile-details .card {
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .profile-details .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
            color: #343a40;
        }
        .profile-details .card-body {
            background-color: #f8f9fa;
        }
        .profile-details h3 {
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #343a40;
        }
        .profile-details p, .profile-details ul {
            font-size: 1em;
            color: #495057;
        }
        .profile-details ul {
            padding-left: 20px;
        }
        .profile-details ul li {
            margin-bottom: 5px;
        }
    </style>

    <div class="container">
        <a href="{{route("files")}}">zurück</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @component('components.modal', ['title'=>'Eintrag erstellen', 'button' => 'Eintrag erstellen', 'name' => 'entry'])
            <form method="POST" action="{{route('files.detail.post', $file->id)}}">
                @csrf
                <input type="hidden" name="form_type" value="entry">
                <div class="mb-3">
                    <label for="entry" class="form-label">Überschrift</label>
                    <input type="text" class="form-control" name="headline" id="entry" aria-describedby="userHelp">
                </div>
                <div class="mb-3">
                    <label for="Text" class="form-label">Inhalt</label>
                    <textarea class="form-control" placeholder="" id="floatingTextarea2" name="text" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <label for="entry" class="form-label">Typ</label>
                    <select class="form-select" id="entry" name="typeId" aria-label="Default select example">

                        @if($entryTypes)
                            @foreach($entryTypes as $entryType)
                                <option value="{{ $entryType->id }}">{{ $entryType->entryName}}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </form>
        @endcomponent

        <hr>

        <div class="profile-header">
            <div>
                <h2>{{$file->name}}</h2>
                <p>Position: {{$file->unit->unitName}}</p>
                <p>Rang: {{$file->rank->rankName}}</p>
                <br>
                <h5>Ausbildungen:</h5>
                @if($educations)
                    @foreach($educations as $education)
                        <ul>
                            <li>{{$education->name}}</li>
                        </ul>
                    @endforeach
                @endif
                @if($educations == null)
                    <div class="alert alert-warning" role="alert">
                        Es wurden noch keine Ausbildungen eingetragen
                    </div>
                @endif
            </div>
        </div>

        <h3>Einträge</h3>

        <!-- Profile Details -->
        <div class="profile-details">
            <div class="card">
                <div class="card-header">
                    Persönliche Informationen
                </div>
                <div class="card-body">
                    <h3>Kontaktinformationen</h3>
                    <p>Email: max.mustermann@example.com</p>
                    <p>Telefon: 01234 567890</p>
                    <h3>Adresse</h3>
                    <p>Beispielstraße 123<br>12345 Musterstadt</p>
                </div>
            </div>
            </div>
        </div>





        @if($entries != null)
            @foreach($entries as $entry)
                <div class="accordion" id="accordionExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$entry->id}}" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                {{$entry->headline}}
                            </button>
                        </h2>
                        <div id="{{$entry->id}}" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                {{$entry->createdFromUser}}
                                {{$entry->text}}
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif

        @if($entries == null)
            <div class="alert alert-warning" role="alert">
                Es wurden noch keine Einträge erstellt
            </div>
        @endif


@endsection
