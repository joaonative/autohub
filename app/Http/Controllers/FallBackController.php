<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class FallBackController extends Controller
{
    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }
}
