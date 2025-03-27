<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $users = User::where('username', 'LIKE', "%{$query}%")->get();

            return response()->json($users);
        }

        return response()->json([]);
    }
}
