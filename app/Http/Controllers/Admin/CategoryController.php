<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Category;
use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.categories.add-category');
    }

    public function newCategory(Request $request){
        $category = new Category();
        $category->category_name        = $request->category_name;
        $category->publication_status   = $request->publication_status;
        $category->save();
        return back()->with('message','Category created successfully!!');
    }


    public function manageCategory(){

        return view('admin.categories.manage-category',[
            'categories' => Category::all()
        ]);

    }

    public function editCategory($id){

        return view('admin.categories.edit-category',[
            'category' => Category::find($id)
        ]);
    }

    public function updateCategory(Request $request){

        $category = Category::find($request->id);
        $category->category_name        = $request->category_name;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect('/admin/category/manage')->with('message','Category updated successfully!!');

    }

    public function deleteCategory(Request $request){


        $post = Post::where('category_id', $request->id)->first();
        if ($post){
            return redirect('/admin/category/manage')->with('message','Category can\'t be deleted because it is in use');
        }
        else{
            $category = Category::find($request->id);
            $category->delete();
            return redirect('/admin/category/manage')->with('message','Category deleted successfully!!');
        }



    }

}
