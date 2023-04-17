<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    
     public function addCategory(Request $request){
        $category = Category::create($request->all());
        return redirect()->route('category'); 
     }

     
    public function destroyCat(Category $category, $id)
    {
        Category::destroy($id);
        return redirect()->route('category');
    
    }
    
    public function DisplayCategories(){

        $categories=Category::all();
        $countCategories= Category::count();

       return view('super.supercategory',compact('categories','countCategories'));     
     
   }

    public function updateCategory(Request $request, $id)
    {
        $category_update = Category::find($id);
        $category_update->update($request->all());
        return redirect()->route('category');
      
    }

}
