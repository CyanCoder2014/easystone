<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeSize extends CRUD
{
    use SoftDeletes;
    protected static $name='انواع سایز بندی';
    protected $fillable= ['name','length','width','height','quantity','tonnage','price_calculation','status'];
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
            'name' =>'length',
            'slug' =>'طول',
            'type' =>'checkbox',
        ],
        [
            'name' =>'height',
            'slug' =>'ارتفاع',
            'type' =>'checkbox',
        ],
        [
            'name' =>'width',
            'slug' =>'عرض',
            'type' =>'checkbox',
        ],
        [
            'name' =>'quantity',
            'slug' =>'تعداد',
            'type' =>'checkbox',
        ],
        [
            'name' =>'tonnage',
            'slug' =>'تناژ',
            'type' =>'checkbox',
        ],
        [
            'name' =>'price_calculation',
            'slug' =>'واحد قیمت',
            'type' =>'select',
            'values' =>['quantity'=>'تعداد','tonnage'=>'تناژ','length'=>'طول','square'=>'مترمربع'],
        ]
    ];
    protected static $url_prefix='TypeSize';
    protected static $middleware=['auth'];
}
