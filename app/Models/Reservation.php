<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'end_time',
        'start_time',
        'title',
        'date',
        'effectif',
        'salle_id',
    ];
    public function user( )
    {
        return $this->belongsTo(User::class);
    }
}
