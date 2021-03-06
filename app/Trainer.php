<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
	protected $fillable = ['name', 'avatar', 'description', 'updated_at'];
    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	/**
     * Get the pokemon for the trainer.
     */
    public function pokemons()
    {
        return $this->hasMany('LaraDex\Pokemon');
    }
}
