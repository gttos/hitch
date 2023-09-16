<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
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
            'title' => ['required', 'string', 'max:255'],
            'info' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string']
        ]);

        $card = Card::create([
            'title' => $request->title,
            'info' => $request->info,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'category_id' => $request->category_id,
            'tag_id' => 1
        ]);

        event(new Registered($card));

        return Redirect::route('auth.card-index');
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
            'title' => ['required', 'string', 'max:255'],
            'info' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string']
        ]);

        $card = Card::find($id);

        $card->update([
            'title' => $request->title,
            'info' => $request->info,
            'category_id' => $request->category_id
        ]);

        return Redirect::route('auth.card-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cardId)
    {
        $card = Card::where('id', $cardId)->first();

        $card->delete();

        return Redirect::route('auth.card-index');
    }
}
