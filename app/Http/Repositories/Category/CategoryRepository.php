<?php
namespace App\Http\Repositories\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index() {
                // Category::whereBetween('created_at',[$request->start_date . '00:00:00',$request->end_date . '23:59:59'])->paginate(1);
        // return Category::with('categoryImages')->get()->toBase();
        return Category::latest()->paginate(3);
    }
    public function store(array $params) {
        // return Category::create($params);
        $category = Category::create([
            'name' => $params['name'],
            'description' => $params['description'],
            'img' => $params['image'],
           'status' => $params['status'],
        ]);
        return $category;
    }
    public function findById($id): Category
    {
        $category = Category::find($id);
        // $category = Category::where('id', $id)->first();

        return $category;
    }
    public function update($request, $id) {
        // dd($request);
        $category = Category::find($id);

        $category->update([
            "name" => $request["name"],
            'description' => $request['description'],
            'img'   => $request['image'],
          'status' => $request['status'],
        ]);
    }
    public function delete($id) {
        Category::find($id)->delete();
        // Category::where('id', $category)->delete();
        // return redirect()->route('categories.index');
    }
}
