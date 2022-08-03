<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller

{
    //function for product list
    public function index() {

        $results = json_decode(file_get_contents('https://poplook.com/test/product_list'));

        if ($results !== NULL) {
            return view('products.index', compact('results'));
        }
    }

    //function for product show 
    public function show($id) {

        $result = json_decode(file_get_contents('https://poplook.com/test/product_info/' . $id));
        
        if ($result !== NULL) {
            $product = $result->data;
            return view('products.show', compact('product'));
        }
    }
}
