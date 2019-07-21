<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Factory extends CRUD
{
    use SoftDeletes;
    protected static $name='کارخانه';
    protected $fillable= ['user_id','city_id','province_id','name','manager','address','phone','mobile','lat','lng','description','logo','background_img','images','licences','status'];
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
//      [
//          'name' =>'city.name',
//          'slug' =>'شهر',
//          'searchable' =>true,
//          'orderable' =>true,
//      ] ,
      [
          'name' =>'address',
          'slug' =>'ادرس',
          'searchable' =>true,
          'orderable' =>true,
      ] ,
      [
          'name' =>'phone',
          'slug' =>'شماره تلفن',
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
          'slug' =>'نام',
          'type' =>'null',
          'default' => true,
      ] ,
      [
          'name' =>'logo',
          'slug' =>'لوگو',
          'type' =>'image',
      ],
      [
          'name' =>'background_img',
          'slug' =>'پس زمینه پروفایل',
          'type' =>'image',
      ],
      [
          'name' =>'name',
          'slug' =>'نام',
          'validation'=>'required',
          'type' =>'text',
      ],
      [
          'name' =>'manager',
          'slug' =>'نام مدیر شرکت',
          'validation'=>'required',
          'type' =>'text',
      ] ,
      [
          'name' =>'phone',
          'slug' =>'تلفن',
          'type' =>'tel',
      ] ,
      [
          'name' =>'mobile',
          'slug' =>'موبایل',
          'type' =>'tel',
      ] ,
      [
          'name' =>'address',
          'slug' =>'آدرس',
          'type' =>'textarea',
      ] ,
      [
          'name' =>'province_id',
          'slug' =>'استان',
          'validation'=>'required',
          'type' =>'select',
          'values' =>'App\Province,id,name',
      ] ,
      [
          'name' =>'city_id',
          'slug' =>'شهر',
          'validation'=>'required',
          'type' =>'select',
          'values' =>'App\City,id,name',
          'condition' => 'province_id,province_id'
      ] ,
      [
          'name' =>'description',
          'slug' =>'توضیحات',
          'type' =>'ckeditor',
      ],
      [
          'name' =>'images',
          'slug' =>'عکس های کارخانه',
          'type' =>'image',
          'addable' =>true,
      ],
      [
          'name' =>'licences',
          'slug' =>'مجوزهای کارخانه',
          'type' =>'image',
          'addable' =>true,
      ]
    ];
    protected static $url_prefix='Factory';
    protected static $middleware=['auth'];

    public function default_user_id(){
        return Auth::id();
    }
    public function user(){
        $this->belongsTo(User::class);
    }
    public function city(){
        $this->belongsTo('App\City');
    }
    public function province(){
        $this->belongsTo(Province::class);
    }
    public static function userFactory(){
        return static::where('user_id',Auth::id())->get();
    }

    public static function laratablesRoleRelationQuery()
    {
        return function ($query) {
            $query->with('city');
        };
    }

}
