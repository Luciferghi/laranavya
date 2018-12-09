<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->Category) {
        $products = Product::with('categories')->whereHas('categories', function($query){
          $query -> where('slug', request()->Category);
        })->paginate(1);

        $categories = Category::all();
        

      } else {
      
        $products = Product::take(10)->paginate(1);
        $categories = Category::all();
      }

        return view('shop')->with([
          'products'=> $products,
          'categories' => $categories,
                          ]);
    }

    public function featured()
    {
      if (request()->Category) {
        $products = Product::with('categories')->whereHas('categories', function($query){
          $query -> where('slug', request()->Category);
        })->paginate(1);

        $categories = Category::all();

      } else {
      
        $products = Product::where('featured', true)->take(10)->paginate(1);
        $categories = Category::all();
      }

        return view('shop')->with([
          'products'=> $products,
          'categories' => $categories,
                          ]);
    }
    public function show($slug){
      $product = Product::where('slug',$slug)->firstOrFail();
      $mightAlsoLike = Product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();
      
      return view('product')->with([
        'product' => $product,
        'mightAlsoLike' => $mightAlsoLike,
      ]);
    }

    public function search(Request $request)
    {
      $query = $request->input('query');

      $products = Product::where('name', 'LIKE', "%$query%")->paginate(1);
      
      $categories = Category::all();
      
      return view('search-results')->with([
        'products' => $products,
        'categories' => $categories,
      ]);
    }

}
