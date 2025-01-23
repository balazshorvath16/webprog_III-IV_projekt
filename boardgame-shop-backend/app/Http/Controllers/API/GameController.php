<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Game::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $game = Game::create($validated);
        return response()->json($game, 201);
    }

    public function show(Game $game)
    {
        return response()->json($game);
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);

        $game->update($validated);
        return response()->json($game);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(null, 204);
    }
}
