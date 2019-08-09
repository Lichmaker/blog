<?php
namespace App\Http\Controllers\Api;

class HooksController extends ApiController
{
    public function github()
    {
        var_dump( \Request::json());

        var_dump(json_decode(file_get_contents('php://input'), true));
    }
}
