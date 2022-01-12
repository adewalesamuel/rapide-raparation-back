<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SousCategorie extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the prestations for the SousCategorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestations()
    {
        return $this->hasMany(Prestation::class);
    }
}
