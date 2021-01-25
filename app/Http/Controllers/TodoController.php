<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TodoService;
use App\Http\Requests\TodoRequest;
use App\Exceptions\TodoNotFoundException;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class TodoController extends Controller
{
    /**
     * It is for todoService
     *
     * @var object
     */
    private $todoService;

    /**
     * For auth and todo service
     *
     * @return void
     */
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
        $this->middleware('auth');
    }

    /**
     * All Todo List
     * @param  \App\Services\TodoService  $todoService
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        try {
            $todoData = $this->todoService->findByStatus();
            $type = 'list';
            $title = 'Todo\'s';

            $finished = User::find(Auth::user()->id)
                ->todos()
                ->where('status', 'finished')
                ->count();
            $unfinished = User::find(Auth::user()->id)
                ->todos()
                ->where('status', 'unfinished')
                ->count();

            $allTodo = User::find(Auth::user()->id)
                ->todos()
                ->count();

            $analytics = [
                'finished' => $finished,
                'unfinished' => $unfinished,
                'allTodo' => $allTodo,
            ];
 
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        return view('todo-list')->with(compact('type', 'todoData', 'title', 'analytics'));
    }

    /**
     * Finished Todo List
     * @param  \App\Services\TodoService  $todoService
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        try {
            $todoData = $this->todoService->findByStatus(
                'todo.status.finished'
            );
            $type = 'list';
            $title = 'Finished Todo\'s';
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * unfinished todo list.
     * @param  \App\Services\TodoService  $todoService
     * @return \Illuminate\Http\Response
     */
    public function unfinished()
    {
        try {
            $todoData = $this->todoService->findByStatus(
                config('todo.status.unfinished')
            );
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        $type = 'list';
        $title = 'Unfinished\'s Todos';

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }
    /**
     * Show detail the todo.
     *
     * @param  \App\Services\TodoService  $todoService
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */

    public function detail(int $id)
    {
        try {
            $todoData = $this->todoService->findById($id);
            $type = 'detail';
            $title = $todoData->title . ' - Detail';
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('todo.create');
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */

    public function file_upload(Request $request)
    {
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request
                ->file('file')
                ->storeAs('uploads', $fileName, 'public');

            return $filePath;
        } else {
            return false;
        }
    }

    /**
     * Create a new todo.
     *
     * @param  \App\Http\Requests\TodoRequest;  $todoRequest
     * @return \Illuminate\Http\Response
     */

    public function store(TodoRequest $todoRequest)
    {
        try {
            $fileName =
                time() .
                '_' .
                $todoRequest->file('image')->getClientOriginalName();

            $filePath = $todoRequest
                ->file('image')
                ->storeAs('uploads', $fileName, 'public');

            $request = $todoRequest->except(['image']);

            $todoData = Todo::create(
                $request + [
                    'user_id' => Auth::user()->id,
                    'image' => '/uploads/' . $fileName,
                ]
            );
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        $title = $todoRequest['title'] . ' is created! 😎';
        $type = 'created';

        return view('todo', compact('type', 'todoData', 'title'));
    }

    /**
     *  Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\TodoRequest;  $request
     * @return \Illuminate\Http\Response
     */

    public function edit(int $id)
    {
        try {
            $todoData = $this->todoService->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', [
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ]);
        }
        return view('todo.edit', compact('todoData'));
    }

    /**
     *  Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\TodoRequest;  $request
     * @return \Illuminate\Http\Response
     */

    public function toggle(int $id)
    {
        try {
            $todoData = $this->todoService->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', [
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ]);
        }

        if ($todoData->status === 'finished') {
            $todoData->status = 'unfinished';
        } else {
            $todoData->status = 'finished';
        }

        $todoData->updated_at = now()->timestamp;
        $todoData->save();

        $res = alert()->warning('Todo updated successfully', 'Success');

        return redirect()
            ->back()
            // ->route('index')
            ->with(['success' => 'Todo updated successfully', 'id' => $id]);
    }

    /**
     * Update selected todo.
     *
     * @param  \Illuminate\Http\Request\TodoRequest  $todoRequest
     * @param  \App\Services\TodoService  $todoService
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */

    public function update(TodoRequest $todoRequest, int $id)
    {
        try {
            $todoData = $this->todoService->findById($id);
            $todoData->title = $todoRequest->title;
            $todoData->desc = $todoRequest->desc;
            $todoData->updated_at = now()->timestamp;
            $todoData->save();
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', [
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ]);
        }

        return redirect()
            ->route('detail', $id)
            ->with('success', 'Todo updated successfully');
    }

    /**
     * Destroy selected todo.
     *
     * @param  \App\Services\TodoService  $todoService
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $this->todoService->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', [
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ]);
        }

        Todo::find($id)->delete();

        $res = alert()->warning('Todo destroyed successfully', 'Success');

        return redirect()
            ->back()
            // ->route('todo-list')
            ->with('success', 'Todo deleted successfully');
    }
}
