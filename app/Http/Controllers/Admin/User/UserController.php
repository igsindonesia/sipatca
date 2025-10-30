<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(Request $request) {
        $query = User::with('department');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('registration_number', 'like', '%' . $search . '%');
            });
        }

        $users = $query->paginate(10)->appends(request()->query());
        return view('admin.user.index', compact('users'));
    }
}