<?php
/**
 * Created by PhpStorm.
 * User: yeqing.lu
 * Date: 2016/10/25
 * Time: 9:56
 */

namespace App\Transformer;

class LessonTransformer extends Transformer{

    public function transform($lesson)
    {
        return[
            'title'=>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free']
        ];
    }
}