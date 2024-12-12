@extends('layouts.app')


@section('title', 'ERREUR!')

@section('content')

<h1>Oups ! Accès refusé</h1>
<p>Vous devez être connecté pour accéder à cette page.</p>
<a href="{{ route('login') }}">Retour à la page de connexion</a>


@endsection
