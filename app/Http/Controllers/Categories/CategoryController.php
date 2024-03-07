<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::all();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }
    public function create() {
        return view('categories.create');
    }
    public function store(Request $request) {
        // dd($request->all());
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
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
        $category = Category::find($id);
        $category = Category::where('id', $id)->first();
        // dd($category);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id) {
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
}
