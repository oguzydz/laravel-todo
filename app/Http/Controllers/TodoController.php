<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TodoService;
use App\Http\Requests\TodoRequest;
use App\Exceptions\TodoNotFoundException;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    private $todoService;
    /**
     * For check alert
     *
     * @return void
     */
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
        $this->middleware('check.alert');
    }

    /**
     * All Todo List
     * @param  \App\Services\TodoService  $todoService
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        try {
            $todoData = $this->todoService->findByStatus();
            $type = 'list';
            $title = 'Todo\'s';
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', [
                'error' => $exception->getMessage(),
            ]);
        }

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * Finished Todo List
     * @param  \App\Services\TodoService  $todoService
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        try {
            $todoDataFinished = $this->todoService->findByStatus(
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

        return view('todo')->with(
            compact('type', 'todoData', 'title')
        );
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
     * Create a new todo.
     *
     * @param  \App\Http\Requests\TodoRequest;  $request
     * @return \Illuminate\Http\Response
     */

    public function store(TodoRequest $todoRequest)
    {
        $todoData = Todo::create($todoRequest->all() + ['user_id' => Auth::user()->id]);
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

        return redirect()
            ->route('todo-list')
            ->with('success', 'Todo deleted successfully');
    }
}
