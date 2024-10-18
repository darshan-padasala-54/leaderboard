<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LeaderboardController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();

        $sort_by = $request->get('sort_by', 'points');
        $sort_order = $request->get('sort_order', 'desc');
        $filter = $request->get('filter');
        $search = $request->get('search');

        // Filtering by day, month and year
        if ($request->has('filter')) {
            $filter = $request->input('filter');

            if(!empty($filter)){
                $query->withCount(['activities as points' => function($q) use($filter) {
                    if ($filter == 'day') {
                        $q->whereDate('created_at', today());
                    } elseif ($filter == 'month') {
                        $q->whereMonth('created_at', now()->month);
                    } elseif ($filter == 'year') {
                        $q->whereYear('created_at', now()->year);
                    }
                    $q->select(\DB::raw('count(*)*20'));
                }]);
            }

            $calculate = clone $query;
            // Calculate ranks
            \App\Services\AssignRank::calculate($calculate->orderByDesc('points')->get());
        }

        // Search
        if ($request->has('search') && !empty($request->search)) {
            $userId = $request->input('search');
            $query->orderByRaw("id = $userId DESC");
        }
        $query->orderBy($sort_by, $sort_order);

        $users = $query->get();
        
        return view('leaderboard.index', compact('users', 'sort_by', 'sort_order', 'search', 'filter'));
    }
}
