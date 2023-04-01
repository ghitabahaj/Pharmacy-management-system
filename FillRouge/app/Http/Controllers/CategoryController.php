<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
     public function store(Request $request){
        $category = Category::create($request->all());
     }

     
    public function destroy(Category $category, $id)
    {
        Category::destroy($id);
    
    }
     

    public function show($id)
    {
        if(Genre::find($id)){
           
        }
    
    }

    public function update(Request $request, $id)
    {
        $category_update = Category::find($id);
        $Category_update->update($request->all());
      
    }

}
