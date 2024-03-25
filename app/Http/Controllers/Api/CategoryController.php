<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use App\Http\Controller\BaseApiController;
use App\Http\Controllers\BaseApiController as ControllersBaseApiController;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ControllersBaseApiController
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->index();
        return $this->success($category, 'category_list', 200);
    }

    public function store(Request $request)
    {
        // dd($request);
        $category = $this->categoryService->store($request->all());

        return $this->success($category, null, 201);

    }
    public function edit($id) {
        $category = $this->categoryService->findById($id);

        return $this->success($category, 'Category_Edit', 200);

    }
    public function update($id) {
        // $category = $this->categoryService->update($id);
        $validator = validator(request()->all(),[
            "name" => "required",
            "description" => "required",
            "img" => "required",
            "status" => "required"
        ]);
        // $category->img = $this->categoryService
        $category = Category::find($id);
        $category->name = request()->name;
        $category->description = request()->description;
        $category->img = request()->image;
        $imageName = time().'.'.$category->img->getClientOriginalExtension();
        // dd($imageName);
        $category->img->move(public_path('/uploadedimages'), $imageName);
        $category->img = $imageName;
        $category->status = request()->status;
        $category->save();

        return $this->success($category, "Category Updated Successfully", 200);
    }
    public function delete($id) {
        $this->categoryService->delete($id);

        return $this->success('', "Category Deleted Successfully", 200);

    }
}
