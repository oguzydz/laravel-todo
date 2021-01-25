<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
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


    

}
