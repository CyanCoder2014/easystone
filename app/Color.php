<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Color extends CRUD
{
    use SoftDeletes;
    protected static $name='رنگ بندی';
    protected $fillable= ['name','img','status'];
    protected static $layout='layout';
    protected static $method_access=[
        'index' => true,
        'create' => true,
        'store' => true,
        'edit' => true,
        'update' => true,
        'destroy' => true,
        'condition' => true,
    ];
    protected static $tablefields=[
        [
            'name' =>'id',
            'slug' =>'شماره',
            'searchable' =>false,
            'orderable' =>true,
        ] ,
        [
            'name' =>'name',
            'slug' =>'نام',
            'searchable' =>true,
            'orderable' =>true,
        ] ,
        [
            'name' =>'action',
            'slug' =>'اعمال',
            'searchable' =>false,
            'orderable' =>false,
        ] ,
    ];
    protected static $crud = [
        [
            'name' =>'name',
            'slug' =>'نام',
            'validation'=>'required',
            'type' =>'text',
        ] ,
        [
            'name' =>'img',
            'slug' =>'عکس',
            'type' =>'image',
        ]
    ];
    protected static $url_prefix='Color';
    protected static $middleware=['auth'];


}
