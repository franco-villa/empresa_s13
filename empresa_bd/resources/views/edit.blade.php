@extends('layout')

@section('title', 'Editar Persona')

@section('content')

    <h2>Personas</h2>
    <table cellpadding="3" cellspacing="5">
        <tr>
            @auth
                @if($persona->image)
                    <img src="/storage/{{ $persona->image}}" alt="{{ $persona->cPerNombre }}" width="300" >
                @endif
                <th colspan="4">Edita los campos que necesites: </th>
            @endauth
        </tr>
        @include('partials.validation-errors')
        <form action="{{ route('personas.update', $persona) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @include('partials.form', ['btnText' => 'Actualizar'])
        </form>
    </table>
        
@endsection