<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // IMPORTANTE: Para la integridad de los datos
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Account;

class TransactionController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user= Auth::user();
        $transactions = $user->transactions()
            ->with(['category', 'account'])
            ->latest('transaction_date')
            ->latest('id')
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();

        $accounts = Auth::user()->accounts;

        return view('transactions.create', compact('categories', 'accounts'));
    }

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

        // Usamos DB::transaction para asegurar que ambos cambios se guarden o ninguno
        DB::transaction(function () use ($validated, $request) {

            // 1. Guardar el movimiento
            $request->user()->transactions()->create($validated);

            // 2. Actualizar el saldo de la cuenta
            $account = Account::findOrFail($validated['account_id']);

            if ($validated['type'] === 'income') {
                $account->increment('balance', $validated['amount']);
            } else {
                $account->decrement('balance', $validated['amount']);
            }
        });

        return redirect()->route('transactions.index')->with('success', '¡Movimiento registrado con éxito!');
    }

    public function edit(string $id)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        $transaction = $user->transactions()->findOrFail($id);

        $categories = Category::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();

        $accounts = Auth::user()->accounts;

        return view('transactions.edit', compact('transaction', 'categories', 'accounts'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'account_id' => 'required|exists:accounts,id',
            'transaction_date' => 'required|date',
        ]);

        $transaction = $request->user()->transactions()->findOrFail($id);

        DB::transaction(function () use ($transaction, $validated) {

            // 1. REVERTIR EL SALDO ANTERIOR
            $oldAccount = Account::findOrFail($transaction->account_id);
            if ($transaction->type === 'income') {
                $oldAccount->decrement('balance', $transaction->amount);
            } else {
                $oldAccount->increment('balance', $transaction->amount);
            }

            // 2. ACTUALIZAR LOS DATOS DEL MOVIMIENTO
            $transaction->update($validated);

            // 3. APLICAR EL NUEVO SALDO (puede ser en la misma cuenta o en otra diferente)
            $newAccount = Account::findOrFail($validated['account_id']);
            if ($validated['type'] === 'income') {
                $newAccount->increment('balance', $validated['amount']);
            } else {
                $newAccount->decrement('balance', $validated['amount']);
            }
        });

        return redirect()->route('transactions.index')->with('success', '¡Movimiento actualizado con éxito!');
    }

    public function destroy(string $id)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        $transaction = $user->transactions()->findOrFail($id);

        DB::transaction(function () use ($transaction) {

            // 1. Revertimos el saldo antes de borrar
            $account = Account::findOrFail($transaction->account_id);
            if ($transaction->type === 'income') {
                $account->decrement('balance', $transaction->amount);
            } else {
                $account->increment('balance', $transaction->amount);
            }

            // 2. Borramos el registro
            $transaction->delete();
        });

        return redirect()->route('transactions.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}
