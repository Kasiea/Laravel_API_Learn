<?php

namespace App\Http\Controllers;

use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lesson;

class LessonsController extends ApiController
{
    protected  $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)//双下划线 依赖注入
    {
        $this->lessonTransformer = $lessonTransformer;
//        $this->middleware('auth.basic',['only'=>['store','update']]);
    }
    //

    public function index()
    {
        $lessons = Lesson::all();
        return $this->response([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->lessonTransformer->transformCollection($lessons->toArray())
            ]);
//        return Lesson::all();//bad
    }

    public function show($id)
    {

        $lesson = Lesson::find($id);//404 not found
        if (!$lesson){
            return $this->responseNotFound();
        }
        return $this->response([
                'status'=>'success',
                'data'=>$this->lessonTransformer->transform($lesson)
            ]);
    }

    public function store(Request $request)
    {
        if (!$request->get('title') or !$request->get('body')){
            return $this->setStatusCode(422)->responseError('validate fails');
        }
        Lesson::create($request->all());
        return $this->setStatusCode(201)->response([
             'status'=>'sucess',
             'message'=>'lesson create'
            ]);
    }

}
