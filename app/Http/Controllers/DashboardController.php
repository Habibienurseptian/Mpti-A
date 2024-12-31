<?php

namespace App\Http\Controllers;

use App\Models\Threads;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $thread = Threads::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $searchTerm = request()->get('search', '');

            // Search both title and content fields
            $thread = $thread->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });

        }

        return view('dashboard', [
            'threads' => $thread->paginate(10)
        ]);
    }
}
