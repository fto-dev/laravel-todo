<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return Todo::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'completed' => 'boolean',
        ]);

        return Todo::create($validated);
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'completed' => 'required|boolean',
        ]);

        $todo->update($validated);

        return $todo->refresh();
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
