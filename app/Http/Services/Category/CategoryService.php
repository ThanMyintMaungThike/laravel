<?php

namespace App\Http\Services\Category;

use App\Http\Repositories\Category\CategoryRepositoryInterface;

class CategoryService {
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }
    public function index() {
        return $this->categoryRepository->index();
    }
    public function store($params) {

        $imageName = time().'.'.$params['image']->getClientOriginalExtension();
        // dd($imageName);
        $params['image']->move(public_path('/uploadedimages'), $imageName);
        $params['image'] = $imageName;

        return $this->categoryRepository->store($params);
    }
}