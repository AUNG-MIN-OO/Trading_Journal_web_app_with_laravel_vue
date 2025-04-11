<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StrategyRule extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function trades(){
        return $this->belongsToMany(Trade::class)
                    ->withPivot('followed')
                    ->withTimestamps();
    }
}
