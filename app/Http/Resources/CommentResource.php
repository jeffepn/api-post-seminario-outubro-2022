<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "type" => "comment",
            "attributes" => [
                "message" => $this->message,
                'created_at' => $this->created_at->format('d-m-Y H:i:s'),
                'updated_at' => $this->updated_at->format('d-m-Y H:i:s'),
            ],
            "relationships" => [
                "post" => [
                    "data" => [
                        "type" => "post",
                        "id" => $this->post_id
                    ]
                ],
                    "user" => [
                        "data" => [
                            "type" => "user",
                            "id" => $this->user_id
                        ]
                    ]
            ],
        ];
    }

    public function with($request)
    {
        if(!$request->included && !is_array($request->included)){
            return [];
        }    

        $included = [];   
        
        if(Arr::has($request->included, 'post')) {
            array_push( $included, new PostResource($this->post));
        }

        if(Arr::has($request->included, 'user')) {
            array_push( $included, new UserResource($this->user));
        }

        return [
            "included" => $included,
        ];
    }
}
