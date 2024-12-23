<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class BetSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_stake',
        'total_potential_payout',
        'total_odds',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }

    public function calculateTotalOdds()
    {
        return $this->bets->reduce(function ($carry, $bet) {
            return $carry * $bet->odds;
        }, 1);
    }

    public function calculatePotentialPayout()
    {
        return $this->total_stake * $this->total_odds;
    }

    public function updateStatus()
    {
        $this->status = $this->bets->every(function ($bet) {
            return $bet->status === 'won';
        }) ? 'won' : 'lost';
        $this->save();
    }
}
