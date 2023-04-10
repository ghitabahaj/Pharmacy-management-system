<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        $Category_update->update($request->all());
        return redirect()->route('category');
      
    }

}
