<?php
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Resources\Categories\CategoryIndexResource;

class CategoryRepository implements CategoryInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $data=Category::query();
        $data->with(['created_user','updated_user']);
        $data->orderBy(request('sort_by'),request('sort_type'));
        return helper_response_fetch(CategoryIndexResource::collection($data->paginate(request('per_page')))->resource);
    }

    public function show($item): \Illuminate\Http\JsonResponse
    {
        return helper_response_fetch($item);
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        $data = Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->image,
        ]);
        return helper_response_created(new CategoryIndexResource($data));
    }

    public function update($request,$item): \Illuminate\Http\JsonResponse
    {
        $item->update([
            'name' => $request->name,
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

}

?>
