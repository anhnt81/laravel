<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";
    public function product(){
    	//đường dẫn,khóa ngoại,khóa chính
    	return $this->hasMany('App\Product','id_type','id');
    	//chung khóa ngoại với bảng Product
    }
}
