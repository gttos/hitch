<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\Uid\Ulid;

class Card extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

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
        'id',
        'title',
        'info',
        'rate',
        'votes',
        'user_id',
        'category_id',
        'tip_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function rates() {
        return $this->belongsToMany(Rate::class);
    }
}