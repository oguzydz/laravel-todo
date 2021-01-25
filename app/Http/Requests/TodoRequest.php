<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class TodoRequest extends FormRequest
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
