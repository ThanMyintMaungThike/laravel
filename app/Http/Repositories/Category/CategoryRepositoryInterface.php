<?php
namespace App\Http\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface {
    public function index();

    public function store(array $params);
    public function findById($id): Category;
    public function update($request, $id);
}
