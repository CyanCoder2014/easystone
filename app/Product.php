<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Product extends CRUD
{
    use SoftDeletes;
    protected static $name='محصولات';
    protected $fillable= ['user_id','factory_id','category_id','color_id','source_id','surface_id','quality_id','name','description','images_sample','images_worked','status'];
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
            'name' =>'factory.name',
            'slug' =>'کارخانه',
            'searchable' =>true,
            'orderable' =>true,
        ] ,
        [
            'name' =>'color.name',
            'slug' =>'دسته بندی',
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
            'name' =>'user_id',
            'slug' =>'کاربر',
            'type' =>'null',
            'default' => true,
        ] ,
        [
            'name' =>'name',
            'slug' =>'نام',
            'validation'=>'required',
            'type' =>'text',
        ],
        [
            'name' =>'factory_id',
            'slug' =>'کارخانه',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Factory,id,name,userFactory',
        ],
        [
            'name' =>'category_id',
            'slug' =>'دسته بندی',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Category,id,name',
        ],
        [
            'name' =>'color_id',
            'slug' =>'رنگ',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Color,id,name',
        ],
        [
            'name' =>'surface_id',
            'slug' =>'نوع سطح',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Surface,id,name',
        ],
        [
            'name' =>'quality_id',
            'slug' =>'کیفیت',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Quality,id,name',
        ],
        [
            'name' =>'source_id',
            'slug' =>'منبع',
            'validation'=>'required',
            'type' =>'select',
            'values' =>'App\Source,id,name',
            'importable' =>'importSource',
        ],
        [
            'name' =>'description',
            'slug' =>'توضیحات',
            'type' =>'ckeditor',
        ],
        [
            'name' =>'images_sample',
            'slug' =>'عکس های نمونه',
            'type' =>'image',
            'addable' =>true,
        ],
        [
            'name' =>'images_worked',
            'slug' =>'عکس های کار شده',
            'type' =>'image',
            'addable' =>true,
        ]
    ];
    protected static $url_prefix='Products';
    protected static $middleware=['auth'];

    public function default_user_id(){
        return Auth::id();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function factory(){
        return $this->belongsTo(Factory::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function source(){
        return $this->belongsTo(Color::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public static function importSource($value){
        $sourse = new Source();
        $sourse->name= $value;
        $sourse->save();
        return $sourse->id;
    }

    public static function laratablesRoleRelationQuery()
    {
        return function ($query) {
            $query->with('city');
        };
    }
}
