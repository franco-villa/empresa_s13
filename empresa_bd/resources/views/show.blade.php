@extends('layout')

@section('title', 'Personas | ' . $persona->cPerNombre)

@section('content')
   

    <h2>DETALLE v2.0</h2>
    <div class="container mt-4">
        <div class="card mx-auto" style="max-width: 33%;">
            <div class="card-header">
                <h2 class="h5">{{ $persona->cPerNombre }}</h2>
            </div>
            <div class="card-body">
                @if($persona->image)
                <div class="text-center mb-3">
                    <img src="/storage/{{ $persona->image }}" alt="{{ $persona->cPerNombre }}" class="img-fluid">
                </div>
                @endif
                <p class="card-text"> <b>cPerRnd: </b> {{ $persona->cPerRnd }}</p>
                <p class="card-text"> <b>Nombre: </b> {{ $persona->cPerNombre }}</p>
                <p class="card-text"> <b>Apellido: </b> {{ $persona->cPerApellido }}</p>
                <p class="card-text"> <b>Sueldo: </b> {{ $persona->nPerSueldo }}</p>
                
                <p class="text-muted">Publicado: {{ $persona->created_at->diffForHumans() }}</p>
                
                @auth
                <div class="d-flex justify-content-between">
                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div> 


    <h2>DETALLE v1.0</h2> 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>            
                <!-- <th>cPerRnd</th> -->
                <th>Nombre</th>
                <th>Apellido</th>
                <th>nPerSueldo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $persona->id }}
                </td>
                <!-- <td>
                    {{ $persona->cPerRnd }}
                </td> -->
                <td>
                    @if($persona->image)
                        <img src="/storage/{{ $persona->image }}" alt="{{ $persona->cPerNombre }}" height="50" >
                    @endif
                    {{ $persona->cPerNombre }}
                </td>
                <td>
                    {{ $persona->cPerApellido }}
                </td>
                <td>
                    {{ $persona->nPerSueldo }}
                </td>
                    @auth
                        <td colspan="4" style="text-align: center;">
                            <a href="{{ route('personas.edit', $persona) }}" class="btn btn-primary" style="margin-right: 10px;">Editar</a>
                            <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    @endauth
            </tr>
        </tbody>
    </table>
   
@endsection