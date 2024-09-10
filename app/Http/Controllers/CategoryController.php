<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryCreateRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryInterface $repository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->repository->show($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        return $this->repository->update($request, $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return $this->repository->destroy($category);
    }
}
