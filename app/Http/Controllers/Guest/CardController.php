<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'explanation' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string']
        ]);

        $card = Card::create([
            'tip' => $request->tip,
            'explanation' => $request->explanation,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'category_id' => $request->category_id,
            'tag_id' => 1,
            'is_approved' => 0
        ]);

        event(new Registered($card));

        return Redirect::route('auth.card-index');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'info' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'string']
        ]);

        $card = Card::find($id);

        $card->update([
            'tip' => $request->tip,
            'explanation' => $request->explanation,
            'category_id' => $request->category_id
        ]);

        return Redirect::route('auth.card-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::where('id', $id)->first();

        $card->delete();

        return Redirect::route('auth.card-index');
    }
}
