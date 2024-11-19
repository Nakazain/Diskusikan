<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Diskusi;
use App\Models\Masalah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiskusiController extends Controller
{
    public function index(){
        $posts = Diskusi::withCount('comments')->latest()->get();
        return view('diskusi', compact('posts'));
        }

    public function masalah(){
            return view('masalah');
        }

    public function laporkan(Request $request){
        $request->validate([
            'username'=>('required'),
            'judul'=>('required'),
            'deskripsi'=>('required'),
        ]);   
        Masalah::create([
            'user_id'=> Auth::id(),
            'username' => $request->username,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('welcome');
        }
    
    public function welcome(){
            $posts = Diskusi::latest()->paginate('2');
            return view('landpage', compact('posts'));
        }
    
    public function add(){
        return view('add');
    }
    
    public function tambah(Request $request){
        $request->validate([
            'username'=>('required'),
            'judul'=>('required'),
            'deskripsi'=>('required'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);   
        $imagePath = 'kosong';
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('diskusis', 'public');
        }
            Diskusi::create([
                'user_id'=> Auth::id(),
                'username' => $request->username,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'image' => $imagePath
            ]);
            if (Auth::user()->usertype == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
    }
    
    public function masuk($id)
    {   
        $post = Diskusi::findOrFail($id);
        $comments = $post->comments()->latest()->get();
        return view('postingan', compact('post', 'comments'));
        }
    public function storeComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string',
    ]);

    $diskusi = Diskusi::findOrFail($id);

    $diskusi->comments()->create([
        'diskusi_id' => $id,
        'user_id' => Auth::id(),
        'username' => Auth::user()->name,
        'comment' => $request->comment,
    ]);

    return redirect()->route('postingan', $id)->with('success', 'Komentar berhasil ditambahkan');
}
    public function destroy($id)
    {
        $diskusi = Diskusi::findOrFail($id);

        if (Auth::id() === $diskusi->user_id) {
    
            if ($diskusi->image) {
                Storage::delete('public/' . $diskusi->image);
            }
    
            $diskusi->delete();
    
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('dashboard');
        }

    }    
        public function comdestroy($id)
{
    $comment = Comment::findOrFail($id);
    
    if (Auth::id() === $comment->user_id || Auth::user()->usertype == 'admin') {

        $comment->delete();
        return redirect()->back();

    }

    return redirect()->back();
}

}

