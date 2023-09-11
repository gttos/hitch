<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class Tag extends Model
{
    use HasFactory;
    use HasUlids;

    protected $primaryKey = 'id';
    public function newUniqueId(): string
    {
        return Ulid::generate();
    }

    public function uniqueIds(): array
    {
        return ['id'];
    }

    protected $fillable = [
        'tag'
    ];

    public function cards() {
        return $this->belongsToMany(Card::class);
    }
}
