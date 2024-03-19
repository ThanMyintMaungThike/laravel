<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        if(!Gate::allows('category_list')){
            return abort(401);
        }
        $categories = Category::all();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }
    public function create() {
        if(!Gate::allows('category_create')){
            return abort(401);
        }
        return view('categories.create');
    }
    public function store(CategoryRequest $request) {
        // dd($request->all());
        if(!Gate::allows('category_create')){
            return abort(401);
        }
        $data = $request->validated();
        // dd($data);
        // $path = $request->file('image')->store('category');
        // dd($request->image);
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        // dd($imageName);
        $request->image->move(public_path('/uploadedimages'), $imageName);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $imageName,
            'status' => $request->status
        ]);
        // DB::table('categories')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ]);

        return redirect()->route('categories.index');
    }
    public function edit($id) {
        // dd($id);
        if(!Gate::allows('category_edit')){
            return abort(401);
        }
        $category = Category::find($id);
        $category = Category::where('id', $id)->first();
        // dd($category);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id) {

        if(!Gate::allows('category_edit')){
            return abort(401);
        }

        $category = Category::find($id);
        // dd($category);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
          'status' => $request->status
        ]);

        // DB::table('categories')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //   'status' => $request->status
        // ]);
        return redirect()->route('categories.index');
    }
    public function delete($id) {

        if(!Gate::allows('category_delete')){
            return abort(401);
        }

        Category::where('id', $id)->delete();
        // DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
}
