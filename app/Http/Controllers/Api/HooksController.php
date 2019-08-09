<?php
namespace App\Http\Controllers\Api;

class HooksController extends ApiController
{
    public function github()
    {
        var_dump(shell_exec('ls'));
    }
}
