@extends('layouts.app')

@section('content')

<table class="table table-bordered" style="margin-top: 50px;">
    <thead>
        <tr>
            <th>Título</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Fecha límite</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
        <tr class="{{ $tarea->completada ? 'text-decoration-line-through text-muted' : '' }}">
            
            <td>{{ $tarea->titulo }}</td>

            <td>
                @if($tarea->prioridad == 'alta')
                    <span class="badge bg-danger">Alta</span>
                @elseif($tarea->prioridad == 'media')
                    <span class="badge bg-warning text-dark">Media</span>
                @else
                    <span class="badge bg-success">Baja</span>
                @endif
            </td>

            <td>
                {{ $tarea->completada ? '✓' : 'Pendiente' }}
            </td>

            <td>{{ $tarea->fecha_limite }}</td>

            <td class="d-flex gap-1">

                <!-- Editar -->
                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <!-- Eliminar -->
                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" onsubmit="return confirm('¿Eliminar tarea?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>

                <!-- Toggle -->
                <form action="{{ route('tareas.toggle', $tarea->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-sm btn-success">✓</button>
                </form>

            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('tareas.create') }}" class="btn btn-primary mb-3">Crear tarea</a>

@endsection