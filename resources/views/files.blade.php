@extends('layouts.base')
@section('title', 'Personalakten')

@section('body')
    <div class="container">
        <h1>Crusader Personalakten</h1>
        <hr>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Rang</th>
                <th scope="col">Einheit</th>
                <th scope="col">Stab</th>
                <th scope="col">Optionen</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr>
                    <th scope="row">{{$file->id}}</th>
                    <td>{{$file->name}}</td>
                    <td>{{$file->rank->rankName}}</td>
                    <td>{{$file->unit->unitName}}</td>
                    <td>{{$file->isStab}}</td>
                    <td>
                        <a href="{{route('files.detail', $file->id)}}" class="btn btn-primary"><x-bi-folder2-open/></a>

                        <button type="button" class="btn btn-primary"><x-bi-pencil/></button>
                        <button type="button" class="btn btn-danger"><x-bi-trash/></button>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
