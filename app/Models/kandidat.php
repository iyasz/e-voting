<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandidat extends Model
{
    protected $fillable = [
        'user_id',
        'vote',
    ];

    public function getIncrementing()
    {
     return false;   
    }

    public function getKeyType()
    {
        return 'string';
    }
    
    protected $table = "kandidat";
    public $timestamps = FALSE;
    use HasFactory, HasUuids;
}
