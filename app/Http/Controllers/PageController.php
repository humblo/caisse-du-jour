<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect('/');
        }
        return view('pages.dashboard', [

        ]);
    }

    public function edit()
    {
        return view('pages.create-edit',[
            'billets' => [5, 10, 20, 50, 100, 200, 500],
            'pieces' => [1, 2],
            'centimes' => [1, 2, 5, 10, 20, 50]
        ]);
    }
}
