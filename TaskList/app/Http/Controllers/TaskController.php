<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create() {
        return view("form");
    }

    public function index() {
        $tareas = Task::all();
        return view("mostrar", compact("tareas"));
    }
    
    public function store(Request $r) {
        $tarea = new Task(); 

        $tarea->title = $r->input('nombre');
        $tarea->desc = $r->input('desc');
        $tarea->isComplete = false;
        $tarea->data = $r->input('fecha');
        $tarea->save();

        return redirect('/');
    }
}
