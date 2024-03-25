<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
// use App\Http\Repositories\Category\CategoryRepository;
use App\Http\Services\Category\CategoryService;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller {

    // private $categoryRepository;
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }
    public function index() {
        if(!Gate::allows('category_list')){
            return abort(401);
        }
        // $categories = Category::all();
        $categories = $this->categoryService->index();
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
        // $data = $request->validated();
        $this->categoryService->store($request->validated());

        // $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        // dd($imageName);
        // $request->image->move(public_path('/uploadedimages'), $imageName);
        // Category::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'img' => $imageName,
        //     'status' => $request->status
        // ]);
        // DB::table('categories')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ]);

        return redirect()->route('categories.index','success');
    }
    public function edit($id) {
        // dd($id);
        if(!Gate::allows('category_edit')){
            return abort(401);
        }
        $category = $this->categoryService->findById($id);

        // dd($category);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id) {

        if(!Gate::allows('category_edit')){
            return abort(401);
        }
        // dd($request);
        $this->categoryService->update($request, $id);

        // dd($category);


        // DB::table('categories')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //   'status' => $request->status
        // ]);
        return redirect()->route('categories.index', 'success= edit');
    }
    public function delete($id) {

        if(!Gate::allows('category_delete')){
            return abort(401);
        }
        $this->categoryService->delete($id);
        // Category::where('id', $id)->delete();
        // Category::find($id)->delete();
        // DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index','delete');
    }
}
