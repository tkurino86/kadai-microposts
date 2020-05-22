<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //追加

class UsersController extends Controller
{
    public function index() {
        // ユーザー一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    } 
    
    public function show($id) {
        
        $user = User::findOrFail($id);
        
        return view('users.show', [
            'user' => $user,    
        ]);
    }
}
