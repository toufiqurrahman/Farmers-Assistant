<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManageUsersController extends Controller
{
    public function viewFarmers() {
        $users = User::where('role', 'farmer')->get();
        return view('manage_users', ['users' => $users]);
    }

    public function viewTraders() {
        $users = User::where('role', 'trader')->get();
        return view('manage_users', ['users' => $users]);
    }

    public function deleteUser(Request $request, $id) {
        $user = User::find($id);
        $user->delete();
        return "OK";
    }
}
