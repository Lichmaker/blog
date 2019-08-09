<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HooksController extends Controller
{
    public function github()
    {
        var_dump(shell_exec('ls'));
    }
}
