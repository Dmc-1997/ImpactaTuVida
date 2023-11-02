<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Courses\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('position','ASC')->get();

        return view('admin.categories.index', compact('categories'));
    }



    public function store(Request $request)
    {
        $data = $this->validate($request,[
            "title"=>"required|unique:categories,title",
            "title.required"=>"Please enter category title !",
            "title.unique" => "This Category name is already exist !"
        ]);

        $input = $request->all();
        $slug =  Str::slug($input['title'],'-');
        $input['slug'] = $slug;
        $input['position'] = (Category::count()+1);
        $data = Category::create($input);

        if(isset($request->status))
        {
            $data->status = '1';
        }
        else
        {
            $data->status = '0';
        }

        if(isset($request->featured))
        {
            $data->featured = '1';
        }
        else
        {
            $data->featured = '0';
        }

        $data->save();

        return back();
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.update', compact('category'));
    }


    public function update(Request $request,$id)
    {
        $data = $this->validate($request,[
            "title"=>"required|unique:categories,title",
            "title.required"=>"Please enter category title !",
            "title.unique" => "This Category name is already exist !"
        ]);

        $data = Category::findorfail($id);
        $input = $request->all();

        $slug =  Str::slug($input['title'],'-');
        $input['slug'] = $slug;

        if (isset($request->status))
        {
            $input['status'] = '1';
        }
        else
        {
            $input['status'] = '0';
        }

        if (isset($request->featured))
        {
            $input['featured'] = '1';
        }
        else
        {
            $input['featured'] = '0';
        }

        $data->update($input);

        return redirect()->route('admin.categories.index');
    }


    public function destroy($id)
    {
        if (Auth::User()->role == "admin") {
            Category::where('id', $id)->delete();
        }

        return back();
    }

}