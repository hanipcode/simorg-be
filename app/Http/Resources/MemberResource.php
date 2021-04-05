<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $current = parent::toArray($request);
        $current['photo'] = asset('storage/' . $current['photo']);
        $current['signature'] = asset('storage/' . $current['signature']);
        return $current;
    }
}
