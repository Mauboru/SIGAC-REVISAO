<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model {
    use HasFactory;
    use SoftDeletes;

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }
}