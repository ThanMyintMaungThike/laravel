<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->index();

        return response()->json([
            'status' => 200,
            'message' => 'Categoy List',
            'data' => $category
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $category = $this->categoryService->store($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Category Create',
            'data' => $category
        ]);
    }
    public function edit($id) {
        $category = $this->categoryService->findById($id);

        return response()->json([
           'status' => 200,
           'message' => 'Category Edit',
            'data' => $category
        ]);
    }
    public function update($request, $id) {
        $category = $this->categoryService->update($request->all(), $id);

        return response()->json([
          'status' => 200,
          'message' => 'Category Update',
            'data' => $category
        ]);
    }
    // public function destroy($id) {
    //     $category = $this->categoryService->destroy($id);

    //     return response()->json([

    //        'status' => 200,
    //       'message' => 'Category Delete',
    //     ])
    // }
}
