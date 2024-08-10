@extends('layout')

@section('title', 'Personas')

@section('content')

    <div class="row">
        <h2>Personas</h2>
        <tr>
            @auth
                <td colspan="4">
                    <a href=" {{ route('personas.create') }} ">Nueva Persona</a>
                </td>
            @endauth
        </tr>
    </div>
    <br>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
        </tr>
            @if($personas)
                @foreach($personas as $persona)
                
                <tr>
                    <td>
                        @if($persona->image)
                            <img src="/storage/{{ $persona->image }}" alt ="{{ $persona->cPerNombre }} width="50" height="50">
                        @endif
                        <a href="{{ route('personas.show', $persona) }}">{{ $persona->cPerNombre }}</a>
                    </td>
                    <td>
                        {{ $persona->cPerApellido }}
                    </td>
                    <td>
                        {{ $persona->nPerEdad }}
                    </td>
                </tr>
                </a>    
                @endforeach
            @else
                <li>No existe ninguna persona que mostar</li>
            @endif
    </table>
   <br>
    <tr>
        <td colspan="1">
            <div class="pagination pagination-sm pagination-custom .page-link">
            {{$personas->links()}}
            </div>
        </td>
    </tr>
    
@endsection