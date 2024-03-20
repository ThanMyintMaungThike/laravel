<?php
namespace App\Http\Repositories\Category;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface {
    public function index(): Collection;

    public function store(array $params);
}
