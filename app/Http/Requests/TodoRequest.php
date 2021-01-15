<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

interface TodoRequestInterface
{
    public function rules(): array;
}

class TodoRequest extends FormRequest implements TodoRequestInterface
{
    /**
     *  Get the validation rules for creating todo.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:1000'],
        ];
    }
}
