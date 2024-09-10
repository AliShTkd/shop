<?php
namespace App\Resources\Products;

use App\Http\Resources\Users\UserRelResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ProductIndexResource extends JsonResource
{
     /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'sale' => $this->sale,
            'view' => $this->view,
            'is_active' => $this->is_active,
            'created_by' => new UserRelResource($this->created_user),
            'updated_by' => new UserRelResource($this->updated_user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}


?>
