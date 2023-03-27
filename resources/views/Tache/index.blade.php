@extends('layouts.master')
@section('title', 'Taches')
@section('content')
<div class="container">
    <h1>Liste des tâches</h1>
    <div>
        <p><a href="{{Route('Tache.create')}}" class="btn btn-primary" role="button">Ajouter un
                e tâche</a></p>
    </div>
    @if (session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif
    @if (!(count($taches) === 0))
        <table class="table">
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td class="header">Expiration</td>
                    <td class="header">Catégorie</td>
                    <td class="header">Description</td>
                    <td class="header">Réalisée</td>
                    <td>Modification/Suppression</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($taches as $tache)
                    <tr>
                        <td>{{$tache->expiration}}</td>
                        <td>{{$tache->categorie}}</td>
                        <td>{{$tache->description}}</td>
                        <td>
                            <input type="checkbox" {{ $tache->accomplie === "O" ? "" : "checked" }} name="" id="">
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{Route('Tache.edit',$tache->id)}}" class="btn-sm btn btn-info">Edit</a>
                            <form action="{{Route('Tache.destroy',$tache->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning" role="alert">Aucune tâche dans la base</div>
    @endif

</div>
@endsection
