<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class Rate extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'value',
        'card_id',
        'user_id',
    ];
}