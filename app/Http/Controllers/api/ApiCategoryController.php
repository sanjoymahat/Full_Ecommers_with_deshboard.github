<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function getCategory(){
        $category = Category::get();
        return response()->json($category);
    }
    public function getsubcategory(Request $request){
        $subcategory = Subcategory::where('category_id',$request->category_id)->get();
        return response()->json($subcategory);
    }
    public function getChildcategory(Request $request){
        $childcategory = Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);
    }
}
