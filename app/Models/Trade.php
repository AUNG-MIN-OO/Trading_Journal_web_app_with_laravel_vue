<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function strategyRules(){
        return $this->belongsToMany(StrategyRule::class)
                    ->withPivot('followed')
                    ->withTimestamps();
    }
}
