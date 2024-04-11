<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    //jquery dynamic page loading
    public function load_module($module)
    {
        return view('docs.'.$module);
    }
}
