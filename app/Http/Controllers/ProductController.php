<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductCreateRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductInterface $repository;

    public function __construct(Product $productRepository)
    {
        $this->repository = $productRepository;
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
    public function store(ProductCreateRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->repository->show($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        return $this->repository->update($request, $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return $this->repository->destroy($product);
    }

    public function change_activation(Product $product)
    {
        return $this->repository->activation($product);

    }
}
