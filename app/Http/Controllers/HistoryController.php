<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history(User $user)
    {
        $user = Auth::user();
        $histories = History::all();
        $detail = Transaksi::all();

        $groupedHistories = $histories->groupBy(function ($date) {
            return $date->created_at->format('d/m/y - H:i');
        });
        $groupedDetails = $detail->groupBy(function ($date) {
            return $date->created_at->format('d/m/y - H:i');
        });


        return view('main.history', compact('groupedHistories', 'groupedDetails', 'user'));


       
    }
}
