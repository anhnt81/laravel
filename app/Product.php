<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    	//chung khóa ngoại với bảng ProductType
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
