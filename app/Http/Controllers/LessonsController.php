<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lesson;

class LessonsController extends Controller
{
    //

    public function index()
    {
        return Lesson::all();//bad
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return $lesson;
    }
}
