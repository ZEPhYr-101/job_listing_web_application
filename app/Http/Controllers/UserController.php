<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request): Response
    {
        $users = User::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->paginate(8)->withQueryString();

        return Inertia::render('Users', [
            'users' => $users,
            'searchInput' => $request->search,
            'can' => [
                'delete_user' => Auth::check() ? Auth::user()->can('delete', User::class) : null,
            ],
        ]);
    }
}
