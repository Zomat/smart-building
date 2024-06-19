<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGateway extends Model
{
    use HasFactory;

    protected $table = 'access_gateway';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'number',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
