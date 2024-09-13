<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $posts = Diskusi::where('user_id', $userId)->latest()->get();
        $jumlah = $posts->count();
        return view('admin.dashboard', compact('posts','jumlah'));
    }
    public function diskusi(){
        $posts = Diskusi::latest()->get();
        return view('admin.diskusi', compact('posts'));
    }
    public function pengguna(){
        $user = User::all();
        return view('admin.pengguna', compact('user'));
    }
    public function add(){
        return view('add');
    }y
    public function destroy($id)
    {
        $diskusi = Diskusi::findOrFail($id);
    
        if ($diskusi->image) {
            Storage::delete('public/' . $diskusi->image);
        }
            $diskusi->delete();
    
        return redirect()->route('dashboard')->with('success', 'Postingan berhasil dihapus.');
    }
        public function hapususer($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('admin.pengguna')->with("success",'Data Berhasil dihapus');;
    }

    
}
