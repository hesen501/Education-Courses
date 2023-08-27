<?php

use Hamcrest\Type\IsArray;
use Illuminate\Support\Arr;

if(!function_exists('selectModel')):
    function selectModel($model, array $columns = null){
        if(is_array($columns)):
            return $model::query()
                        ->select($columns)
                        ->get();
        elseif($columns==null):
            return $model::query()
                        ->get();
        endif;
    }
endif;