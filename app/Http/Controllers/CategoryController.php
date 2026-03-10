<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userCategories = $user->categories()->latest()->get();
        $defaultCategories = Category::whereNull('user_id')->get();
        return view('categories.index', compact('userCategories', 'defaultCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|in:income,expense',
            'color' => 'required|string|max:7', 
            'icon' => 'nullable|string|max:50',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->categories()->create($validated);
        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }

    public function destroy(Category $category)
    {
        // Verificacion si es el dueño para poder eliminar una categoria
        if ($category->user_id === Auth::id()) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Categoría eliminada.');
        }
        return redirect()->route('categories.index')->with('error', 'No tienes permiso para eliminar esta categoría.');
    }
}
