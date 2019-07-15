<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends CRUD
{
    use SoftDeletes;
    protected static $name='کیفیت';
    protected $fillable= ['name','status'];
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
        ],
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
        ]
    ];
    protected static $url_prefix='Color';
    protected static $middleware=['auth'];
}
