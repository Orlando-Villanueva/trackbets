<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        'bet_slip_id',
        'match',
        'bet_type',
        'selection',
        'odds',
        'status'
    ];

    public function betSlip()
    {
        return $this->belongsTo(BetSlip::class);
    }

    public function updateStatus($result)
    {
        $this->status = $result;
        $this->save();
        
        // Update parent bet slip status
        $this->betSlip->updateStatus();
    }
}
