<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $posts = Diskusi::where('user_id', $userId)->latest()->get();
        $jumlah = $posts->count();
        return view('dashboard', compact('posts','jumlah'));
    }
        public function diskusi(){
            return view('diskusi');
        }
    
}
