<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use Illuminate\Http\Request;

class TanksController extends Controller
{
    /**
     * Get all tanks along with their relations.
     */
    public function index()
    {
        // Retrieve all tanks with their relations
        $tanks = Tank::with(['fuel', 'orders', 'transactions'])->get();

        return response()->json($tanks);
    }

    /**
     * Get a single tank by ID along with its relations.
     */
    public function show($id)
    {
        // Find the tank by ID and load its relations
        $tank = Tank::with(['fuel', 'orders', 'transactions'])->find($id);

        if (!$tank) {
            return response()->json(['message' => 'Tank not found'], 404);
        }

        return response()->json($tank);
    }
}
