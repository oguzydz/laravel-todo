<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\TodoService;
use App\Http\Requests\TodoRequest;
use App\Exceptions\TodoNotFoundException;

class HomeController extends Controller
{
    /**
     * For check auth
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(TodoService $todoService)
    {
        try {
            $todoData = $todoService->getTodoList();
            $type = 'list';

            if (count($todoData) === 0) {
                $noData = true;
                $msg = (object) [
                    'type' => 'danger',
                    'content' => 'You do not have todo list!',
                    'urlLink' => '/todo/create',
                    'urlContent' => 'Want to add a todo!',
                ];
            } else {
                $noData = false;
                $msg = null;
            }
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        return view('index', compact('todoData', 'type', 'noData', 'msg'));
    }
}
