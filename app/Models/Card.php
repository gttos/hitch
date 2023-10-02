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
        'tip',
        'explanation',
        'votes_rate',
        'votes_number',
        'user_id',
        'category_id',
        'is_approved',
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

    public function votes() {
        return $this->hasMany(Vote::class);
    }

    public static function countVotes()
    {
        $cards = Card::all();

        foreach ($cards as $card){
            $total = $card->votes()->count();
            if ($total === 0){
                break;
            }
            $likes = $card->votes()->where('vote', 1)->count();
            $rate = ($likes * 100) / $total;

            $card->update([
                'votes_rate' => $rate,
                'votes_number' => $total
            ]);
        }
    }
}