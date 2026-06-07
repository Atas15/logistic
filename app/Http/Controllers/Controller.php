<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
    {
        $modes = TransportMode::all();
        return view('index', ['modes' => $modes]);
    }
}
