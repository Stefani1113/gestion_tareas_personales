@extends('layouts.app')

@section('content')

<h3>Crear tarea</h3>

<form action="{{ route('tareas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control">
        @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Prioridad</label>
        <select name="prioridad" class="form-control">
            <option value="baja">Baja</option>
            <option value="media">Media</option>
            <option value="alta">Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Fecha Límite</label>
        <input type="date" name="fecha_limite" class="form-control">
        @error('fecha_limite')
            <div class="text-danger">{{ $message }}</div>
        @enderror   
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

@endsection