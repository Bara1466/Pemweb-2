<?php

namespace App\Models;

use CodeIgniter\Model;

class bukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $useTimestamp = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
