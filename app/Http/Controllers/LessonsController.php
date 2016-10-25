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
        $lessons = Lesson::all();
        return\Response::json([
            'status'=>'success',
            'status_code'=>200,
                'data'=>$this->transformCollection($lessons)
            ]);
//        return Lesson::all();//bad
    }

    public function show($id)
    {

        $lesson = Lesson::findOrFail($id);
        return \Response::json([
                'status'=>'success',
                'status_code'=>200,
                'data'=>$this->transform($lesson)
            ]
        );
//        return $lesson;
    }

    private function transform($lesson)
    {
        return[
            'title'=>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free']
        ];
    }

    private function transformCollection($lessons)
    {
        return array_map([$this,'transform'],$lessons->toArray());
    }
}
