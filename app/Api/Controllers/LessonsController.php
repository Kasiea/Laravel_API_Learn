<?php
/**
 * Created by PhpStorm.
 * User: yeqing.lu
 * Date: 2016/10/25
 * Time: 17:32
 */

namespace App\Api\Controllers;


use App\Api\Transformers\LessonTransformer;
use App\Http\Controllers\Controller;
use App\Lesson;

class LessonsController extends BaseController
{
        public function index()
        {
            $lessons = Lesson::all();
            return $this->collection($lessons,new LessonTransformer());
        }
}