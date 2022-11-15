<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function generateKey()
    {
        return \Illuminate\Support\Str::random(32);
    }

    public function fooExample()
    {
        return 'Example Request';
    }

    public function getUser($id)
    {
        return 'User ID = ' . $id;
    }

    //
}
