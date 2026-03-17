<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userId = $user->id;

        // 1. Calculamos estadísticas
        $stats = [
            'total_balance' => (float) Transaction::where('user_id', $userId)
                ->sum(DB::raw('CASE WHEN type = "income" THEN amount ELSE -amount END')),

            'monthly_income' => (float) Transaction::where('user_id', $userId)
                ->where('type', 'income')
                ->whereMonth('transaction_date', now()->month)
                ->whereYear('transaction_date', now()->year)
                ->sum('amount'),

            'monthly_expenses' => (float) Transaction::where('user_id', $userId)
                ->where('type', 'expense')
                ->whereMonth('transaction_date', now()->month)
                ->whereYear('transaction_date', now()->year)
                ->sum('amount'),
        ];

        // 2. Obtenemos datos para los selects del modal
        $categories = Category::whereNull('user_id')
            ->orWhere('user_id', $userId)
            ->get();

        $accounts = $user->accounts;

        // 3. Obtenemos los últimos 5 movimientos para la lista del Dashboard
        $recentTransactions = $user->transactions()
            ->with('category') // Traemos la categoría para pintar la píldora
            ->latest('transaction_date')
            ->latest('id')
            ->take(5)
            ->get();

        // 4. Enviamos TODO a la vista
        return view('dashboard', compact('stats', 'categories', 'accounts', 'recentTransactions'));
    }
}
