<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surface extends CRUD
{
    use SoftDeletes;
    protected static $name='انواع سطوح';
    protected $fillable= ['name','status'];
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
            'validation'=>'required',
            'type' =>'text',
        ] ,
        [
            'name' =>'status',
            'slug' =>'وضعیت',
            'type' =>'select',
            'values' => ['تایید نشده','تایید شده',]
        ] ,
    ];
    protected static $url_prefix='Surface';
}
