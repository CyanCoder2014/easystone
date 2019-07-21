<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProcessings extends Model
{
    public static function MakeRel(Model $model,$values){
        static::where('product_id',$model->id)->delete();
        $rows =[];
        foreach ($values as $value){
            $rows[]=[
                'product_id' => $model->id,
                'processing_id' => $value,
            ];
        }
        static::insert($rows);
    }
}
