<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return view('auth.card.card-index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('auth.card.card-create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tip' => ['required', 'string', 'max:255'],
            'explanation' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string'],
            'is_approved' => ['required', 'string'],
            'tags' => ['nullable']
        ]);

        $card = Card::create([
            'tip' => $request->tip,
            'slug' => Str::slug($request->tip),
            'explanation' => $request->explanation,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'category_id' => $request->category_id,
            'is_approved' => $request->is_approved
        ]);

        $this->syncCardWithTags($request, $card);

        event(new Registered($card));

        return Redirect::route('auth.card-index')
            ->with('success', 'Data saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $card = Card::where('id', $id)->first();
        $categories = Category::all();
        return view('auth.card.card-edit', [
            'card' => $card,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tip' => ['required', 'string', 'max:255'],
            'explanation' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string'],
            'is_approved' => ['required', 'string'],
            'tags' => ['nullable']
        ]);

        $card = Card::find($id);

        $card->update([
            'tip' => $request->tip,
            'slug' => Str::slug($request->tip),
            'explanation' => $request->explanation,
            'category_id' => $request->category_id,
            'is_approved' => $request->is_approved
        ]);

        $this->syncCardWithTags($request, $card);

        return Redirect::route('auth.card-index')
            ->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::where('id', $id)->first();

        $card->delete();

        return Redirect::route('auth.card-index')
            ->with('success', 'Deleted successfully!');
    }

    private function syncCardWithTags(Request $request, $card): void
    {
        $tagWords = explode(',', $request->input('tags'));
        $tagSlug = [];

        foreach ($tagWords as $word) {
            $tagSlug[] = Str::slug($word, '-');
        }
        $newTags = collect($tagSlug)->map(function ($tagSlug) {
            $humanWord = Str::title(str_replace('-', ' ', $tagSlug));
            return Tag::firstOrCreate(
                ['slug' => Str::slug($tagSlug)],
                [
                    'name' => Str::upper($humanWord),
                    'slug' => Str::slug($tagSlug)
                ]
            );
        });

        $card->tags()->sync($newTags->pluck('id'));
    }
}
