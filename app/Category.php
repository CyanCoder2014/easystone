<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends CRUD
{
    use SoftDeletes;
    protected static $name='دسته بندی';
    protected $fillable= ['name','img_sample','img_worked','status'];
    protected static $layout='admin';
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
            'name' =>'status',
            'slug' =>'وضعیت',
            'searchable' =>false,
            'orderable' =>true,
        ] ,
        [
            'name' =>'action',
            'slug' =>'اعمال',
            'searchable' =>false,
            'orderable' =>false,
        ]
    ];
    protected static $crud = [
        [
            'name' =>'name',
            'slug' =>'نام',
            'type' =>'text',
        ] ,
        [
            'name' =>'img_sample',
            'slug' =>'عکس نمونه',
            'type' =>'image',
        ] ,
        [
            'name' =>'img_worked',
            'slug' =>'عکس کارشده',
            'type' =>'image',
        ] ,
        [
            'name' =>'status',
            'slug' =>'وضعیت',
            'type' =>'select',
            'values' => ['تایید نشده','تایید شده',]
        ] ,
    ];
    protected static $url_prefix='Categories';
}
