<?php
namespace App\Http\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index(): Collection {
        // return Category::with('categoryImages')->get()->toBase();
        return Category::all();
    }
    public function store(array $params) {
        // return Category::create($params);
        Category::create([
            'name' => $params['name'],
            'description' => $params['description'],
            'img' => $params['image'],
            'status' => $params['status'],
        ]);
    }
}
