<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /**
     * Get the trainer that owns the pokemons.
     */
    public function trainer()
    {
        return $this->belongsTo('LaraDex\Trainer');
    }
}
