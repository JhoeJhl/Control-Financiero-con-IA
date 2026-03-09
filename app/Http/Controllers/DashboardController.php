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

        // 1. Calculamos estadísticas una sola vez
        $stats = [
            'total_balance' => (float) Transaction::where('user_id', $userId)
                ->sum(DB::raw('CASE WHEN type = "income" THEN amount ELSE -amount END')) ?? 0,

            'monthly_income' => (float) Transaction::where('user_id', $userId)
                ->where('type', 'income')
                ->whereMonth('transaction_date', now()->month)
                ->whereYear('transaction_date', now()->year)
                ->sum('amount') ?? 0,

            'monthly_expenses' => (float) Transaction::where('user_id', $userId)
                ->where('type', 'expense')
                ->whereMonth('transaction_date', now()->month)
                ->whereYear('transaction_date', now()->year)
                ->sum('amount') ?? 0,
        ];

        // 2. Obtenemos datos para los selects del modal
        $categories = Category::whereNull('user_id')
            ->orWhere('user_id', $userId)
            ->get();
            
        $accounts = $user->accounts;

        // 3. Enviamos TODO a la vista
        return view('dashboard', compact('stats', 'categories', 'accounts'));
    }
}