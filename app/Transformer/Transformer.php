<?php
/**
 * Created by PhpStorm.
 * User: yeqing.lu
 * Date: 2016/10/25
 * Time: 9:53
 */
namespace App\Transformer;

abstract class Transformer{

    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($item);

}