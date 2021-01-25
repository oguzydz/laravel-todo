<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ManagerTodoController extends Controller
{
    /**
     * Display a todo of the resource.
     *
     * @param string $id
     * @return void Inertia\Inertia
     */
    public function index($id)
    {
        $todo = Todo::find($id);

        return Inertia::render('TodoDetail', [
            'user' => Auth::user(),
            'todo' => $todo,
        ]);
    }
}
