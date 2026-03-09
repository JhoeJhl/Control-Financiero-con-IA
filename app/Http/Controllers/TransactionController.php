<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Account;

class TransactionController extends Controller
{
    /**
     * Lista de movimientos.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // CORRECCIÓN: El nombre de la variable debe ser $transactions (plural) 
        // para que coincida con el compact('transactions')
        $transactions = $user->transactions()
            ->with('category')
            ->latest('transaction_date')
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();

        $accounts = Auth::user()->accounts;

        // CORRECCIÓN: Debes pasar las variables a la vista para que el select no esté vacío
        return view('transactions.create', compact('categories', 'accounts'));
    }

    /**
     * Guardar movimiento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'account_id' => 'required|exists:accounts,id',
            'transaction_date' => 'required|date',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Creamos la transacción
        $transaction = $user->transactions()->create($validated);

        // Actualización de saldo
        $account = Account::find($request->account_id);
        if ($request->type === 'income') {
            $account->increment('balance', $request->amount);
        } else {
            $account->decrement('balance', $request->amount);
        }

        return redirect()->route('transactions.index')->with('success', '¡Movimiento registrado con éxito!');
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(string $id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        // CORRECCIÓN: Implementación del método Edit
        $transaction = $user->transactions()->findOrFail($id);
        
        $categories = Category::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();

        $accounts = Auth::user()->accounts;

        return view('transactions.edit', compact('transaction', 'categories', 'accounts'));
    }

    /**
     * Actualizar movimiento.
     */
    public function update(Request $request, string $id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $transaction = $user->transactions()->findOrFail($id);
        
        // Aquí iría una lógica similar al store, pero revirtiendo el saldo 
        // anterior antes de aplicar el nuevo.
    }

    /**
     * Eliminar movimiento.
     */
    public function destroy(string $id)
    {
    
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $transaction = $user->transactions()->findOrFail($id);
        
        // Revertimos el saldo en la cuenta antes de borrar
        $account = Account::find($transaction->account_id);
        if ($transaction->type === 'income') {
            $account->decrement('balance', $transaction->amount);
        } else {
            $account->increment('balance', $transaction->amount);
        }

        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Movimiento eliminado');
    }
}