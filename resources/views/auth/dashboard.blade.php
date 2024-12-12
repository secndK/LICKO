@extends('layouts.app')


@section('title', 'Dashboard')

@section('content')

<h1>Welcome, {{ Auth::user()->nom_prenom }}</h1>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Déconnexion
    </button>
</form>


@endsection
