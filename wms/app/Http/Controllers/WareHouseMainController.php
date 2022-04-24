<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;

class WareHouseMainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
    	
    	// Get all products
    	$products = Product::all();

    	// Return a view with the products attached
    	return view('main', ['products' => $products]);
    }

    public function sell($productId){
    	
    	// Find and delete the product that the user passed
    	$product = Product::findOrFail($productId);
    	$product->delete();

    	// Go back to the main page
    	return redirect('/');
    }
}
