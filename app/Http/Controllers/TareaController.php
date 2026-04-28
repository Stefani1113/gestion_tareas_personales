<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Muestra todas las tareas
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tareas = Tarea::orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Muestra formulario para crear tarea
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Guarda nueva tarea
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
    [
        'titulo' => 'required|string|min:3|max:100',
        'descripcion' => 'nullable|string|max:500',
        'prioridad' => 'required|in:baja,media,alta',
        'fecha_limite' => 'nullable|date|after_or_equal:today',
    ],
    [
        'titulo.required' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
        'titulo.min' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
        'titulo.max' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',

        'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',

        'prioridad.required' => 'La prioridad debe ser baja, media o alta.',
        'prioridad.in' => 'La prioridad debe ser baja, media o alta.',

        'fecha_limite.after_or_equal' => 'La fecha límite debe ser hoy o una fecha futura.',
        'fecha_limite.date' => 'La fecha límite debe ser hoy o una fecha futura.',
    ]
);
        Tarea::create($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Muestra formulario con datos guardados
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Actualiza una tarea 
     * @param Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate(
    [
        'titulo' => 'required|string|min:3|max:100',
        'descripcion' => 'nullable|string|max:500',
        'prioridad' => 'required|in:baja,media,alta',
        'fecha_limite' => 'nullable|date|after_or_equal:today',
    ],
    [
        'titulo.required' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
        'titulo.min' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
        'titulo.max' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',

        'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',

        'prioridad.required' => 'La prioridad debe ser baja, media o alta.',
        'prioridad.in' => 'La prioridad debe ser baja, media o alta.',

        'fecha_limite.after_or_equal' => 'La fecha límite debe ser hoy o una fecha futura.',
        'fecha_limite.date' => 'La fecha límite debe ser hoy o una fecha futura.',
    ]
);

        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Elimina una tarea
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada.');
    }

    /**
     * Cambia estado de tarea a completada
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->completada = !$tarea->completada;
        $tarea->save();

        return redirect()->route('tareas.index');
    }
}
