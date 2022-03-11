<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //    DB::enableQueryLog();

        $resources = [
            "post_id" => $this->id,
            "post_title" => $this->title,
            "description" => $this->description,
            "author_name" => $this->user->name,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];

        //   dump(DB::getQueryLog());

        return $resources;
    }
}
