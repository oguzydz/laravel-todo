<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\TodoNotFoundException;
use App\Models\Todo;
use Illuminate\Support\Facades\Redirect;

class TodoService
{
    public function findById(int $id)
    {
        $todoData = User::find(Auth::user()->id)
            ->todos()
            ->where('id', $id)
            ->firstOrFail();
        return $todoData;
    }

    public function findByStatus(?string $status = null)
    {
        $userId = $userId ?? Auth::user()->id;

        $todoData = User::find($userId)->todos();

        if (filled($status)) {
            $todoData->where('status', $status);
        }

        $todoResult = $todoData->paginate(config('todo.paginate_number'));

        return $todoResult;
    }



    public function create($data)
    {
        Todo::create($data + ['user_id' => Auth::user()->id]);

        return redirect()
            ->route('todo-list')
            ->with('success', config('todo.create_message'));
    }

    public function getTodoList()
    {
        $todoData = Todo::where('user_id', Auth::user()->id)->simplePaginate(config('todo.paginate_number'));
        return $todoData;
    }
}
