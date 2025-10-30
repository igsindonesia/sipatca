<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(Request $request) {
        $query = User::with('department')->where('type', 'student');

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

    function lecturers(Request $request) {
        $query = User::with('department')->where('type', 'lecturer');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('registration_number', 'like', '%' . $search . '%');
            });
        }

        $users = $query->paginate(10)->appends(request()->query());
        return view('admin.user.lecturers', compact('users'));
    }

    function createLecturer() {
        $departments = \App\Models\Department::all();
        return view('admin.user.create_lecturer', compact('departments'));
    }

    function storeLecturer(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'nullable|exists:departments,id',
            'registration_number' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['name', 'email', 'department_id', 'registration_number']);
        $data['password'] = bcrypt($request->password);
        $data['type'] = 'lecturer';
        $data['email_verified_at'] = now();

        if (User::create($data)) {
            return redirect()->route('admin.lecturer.index')->with('status', 'success')->with('message', 'Dosen berhasil ditambahkan');
        }

        return redirect()->back()->with('status', 'error')->with('message', 'Gagal menambahkan dosen');
    }

    function editLecturer(User $user) {
        $departments = \App\Models\Department::all();
        return view('admin.user.edit_lecturer', compact('user', 'departments'));
    }

    function updateLecturer(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'department_id' => 'nullable|exists:departments,id',
            'registration_number' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'department_id', 'registration_number']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($user->update($data)) {
            return redirect()->route('admin.lecturer.index')->with('status', 'success')->with('message', 'Dosen berhasil diupdate');
        }

        return redirect()->back()->with('status', 'error')->with('message', 'Gagal mengupdate dosen');
    }

    function destroyLecturer(User $user) {
        if ($user->delete()) {
            return redirect()->route('admin.lecturer.index')->with('status', 'success')->with('message', 'Dosen berhasil dihapus');
        }

        return redirect()->back()->with('status', 'error')->with('message', 'Gagal menghapus dosen');
    }
}