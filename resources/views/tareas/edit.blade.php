@extends('layouts.app')

@section('content')

<h3>Editar tarea</h3>

<form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $tarea->titulo }}">
        @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control">{{ $tarea->descripcion }}</textarea>
    </div>

    <div class="mb-3">
        <label>Prioridad</label>
        <select name="prioridad" class="form-control">
            <option value="baja" {{ $tarea->prioridad=='baja'?'selected':'' }}>Baja</option>
            <option value="media" {{ $tarea->prioridad=='media'?'selected':'' }}>Media</option>
            <option value="alta" {{ $tarea->prioridad=='alta'?'selected':'' }}>Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <input type="date" name="fecha_limite" class="form-control">
        @error('fecha_limite')
        <div class="text-danger">{{ $message }}</div>
        @enderror 
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection