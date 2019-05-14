<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
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
            'id' => $this->id,
            'judul' => $this->judul,
            'gambar' => $this->gambar,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun,
            'penerbit' => $this->penerbit,
            'kategori' => $this->kategori
        ];
    }
}
