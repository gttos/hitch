<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class Card extends Model
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
        'title',
        'description',
        'rate',
        'votes',
        'user_id',
        'tip_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tip()
    {
        return $this->belongsTo(Tip::class, 'tip_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function rates() {
        return $this->belongsToMany(Rate::class);
    }
}
