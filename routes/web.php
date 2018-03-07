<?php
use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categories = Category::all();
    return view('index')->with('categories', $categories);
});

Route::get('/ajax-subcat', function(){
    $cat_id = Input::get('cat_id');
    $subcategories = Subcategory::where('category_id', '=', $cat_id)->get();

    return Response::json($subcategories);
});
