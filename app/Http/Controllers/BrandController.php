<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandCreateRequest;
use App\Http\Requests\Brands\BrandUpdateRequest;
use App\Interfaces\BrandInterface;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    protected BrandInterface $repository;

    public function __construct(BrandInterface $brandRepository)
    {

        $this->repository = $brandRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return  $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandCreateRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return $this->repository->show($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        return $this->repository->update($request, $brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        return $this->repository->destroy($brand);
    }
}
