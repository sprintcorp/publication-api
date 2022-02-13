<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'book_id'=> $this->id,
            'book_title' => $this->title,
            'book_authors' => AuthorResources::collection($this->authors),
            'book_publishers' => PublisherResources::collection($this->publishers),
        ];
    }
}
