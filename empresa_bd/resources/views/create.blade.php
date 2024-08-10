@extends('layout')

@section('title', 'Registrar Persona')

@section('content')

    <h2>Personas</h2>
    <table cellpadding="3" cellspacing="5">
        <tr>
            <th colspan="4">Registrar nueva persona</th>
        </tr>
        @include('partials.validation-errors')
        <form action="{{ route('personas.store') }}" method="post" enctype="multipart/form-data">
            @include('partials.form', ['btnText' => 'Guardar'])
        </form>
    </table>
        
@endsection