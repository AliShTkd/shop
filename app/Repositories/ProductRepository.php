<?php
namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use App\Resources\Products\ProductIndexResource;

class ProductRepository implements ProductInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $data=Product::query();
        $data->with(['created_user','updated_user']);
        $data->orderBy(request('sort_by'),request('sort_type'));
        return helper_response_fetch(ProductIndexResource::collection($data->paginate(request('per_page')))->resource);
    }

    public function show($item): \Illuminate\Http\JsonResponse
    {
        $item->update(['view'=>$item->view+1]);
        return helper_response_fetch($item);
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        $data = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->image,
        ]);
        return helper_response_created(new ProductIndexResource($data));
    }

    public function update($request,$item): \Illuminate\Http\JsonResponse
    {
        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale' => $request->sale,
            'view' => $request->view,
            'description' => $request->description,
            'image' => $request->image,
        ]);
        return helper_response_updated($item);
    }

    public function destroy($item): \Illuminate\Http\JsonResponse
    {
        $item->delete();
        return helper_response_deleted();
    }

    public function activation($item): \Illuminate\Http\JsonResponse
    {

        $item->update(['is_active' => !$item->is_active]);
        return helper_response_updated($item);
    }

}

?>
