<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'extension',
        'size',
        'url',
        'model_id',
        'model_type',
    ];

    /**
     * Get the owning model of the file.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
