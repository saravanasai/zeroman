<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Environment extends Model
{
    use HasFactory,SoftDeletes;


    protected $guarded = [];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function variables() : HasMany {

        return $this->hasMany(EnvironmentVariables::class,'environment_id','id');
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeOwnEnvironments(Builder $query): void
    {
        $query->where('visibility', 1)->where('is_active',1)->where('user_id',auth()->user()->id);
    }


}
