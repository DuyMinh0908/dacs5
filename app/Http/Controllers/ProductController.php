<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
     public function show(){
        $product = DB::table('product')
                ->join('image_product','product.id','=','image_product.id')
                ->select('product.id','product.title','product.description',
                          'product.price','product.order','image_product.name')
                ->get();
            return $product;
     }
}
