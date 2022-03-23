<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the services for the Prestation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the sous_categories that owns the Prestation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class);
    }
}
