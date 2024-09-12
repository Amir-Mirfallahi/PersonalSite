<?php

namespace App\Http\Controllers;

use App\Models\AvailableAt;

class AvailableAtController extends Controller
{
    public function index()
    {
        $socialMedia = AvailableAt::all();
        return response()->json($socialMedia);
    }
}
