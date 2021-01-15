<?php declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;

interface TodoNotFoundInterface
{
    public function report();
    public function render();
}

class TodoNotFoundException extends ModelNotFoundException implements TodoNotFoundInterface
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('errors.notfound');
    }
}
