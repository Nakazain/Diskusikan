<x-app-layout>
     
    <center class="mt-44 text-white">
        <h1 class=" text-slate-900 dark:text-white font-bold text-5xl">Selamat datang di Diskusikan</h1>
        <P class="text-slate-900 dark:text-white text-xl mt-1 mb-10">Diskusikan adalah sebuah aplikasi untuk berdiskusi tentang sebuah topik apapun</P>
        @guest
        <p class=" text-slate-900 dark:text-white">Login terlebih dahulu</p>
        <a href="/login" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info dark:border-info m-2">Log in</a>
        <a href="/register" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info dark:border-info">Register</a>
        @else
        @if (Auth::user()->usertype == 'admin')
        <a href="/admin/dashboard" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info mr-2 dark:border-info">Dashboard</a>
        <a href="/admin/diskusi" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info dark:border-info">Lihat Postingan pengguna</a>
        @endif
        @if (Auth::user()->usertype == 'user')
        <a href="/dashboard" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info mr-2 dark:border-info">Dashboard</a>
        <a href="/add" class="btn btn-outline border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white hover:border-amber-500 dark:btn-info dark:border-info">Tambah Postingan</a>
        @endif
        @endguest
        
    </center>
    <div class="m-20 mt-40">
        <div class="lg:grid grid-cols-2 gap-10">
            <div>
            <p class="text-3xl">Apa itu diskusikan?</p>
            <p class="mt-5">Diskusikan adalah sebuah forum untuk diskusi, Bagi kalian yang masih merasa malu untuk mengutarakan pendapat kalian secara langsung. Tenang, Sekarang telah ada Diskusikan, Kalian tidak perlu berbicara secara langsung, cukup dengan internet dan Diskusikan kalian tidak perlu malu lagi untuk mengutarakan pendapat. </p>
        </div>
        <div class="mb-20">
            <p class="text-2xl">Beberapa postingan terbaru</p>
            @foreach ($posts as $item)
            <div class="grid grid-cols-1">
            <a href="/postingan/{{ $item->id }}" class="card bg-base-300 dark:bg-base-100 w-full shadow-xl rounded-md mt-5">
                <div class="card-body dark:text-white h-full hover:outline rounded-sm">
                    <h2 class="card-title line-clamp-2 pb-1">
                        {{ $item->judul }}
                    </h2>
                    <p class="line-clamp-3">{{ $item->deskripsi }}</p>
                    <div class="badge bg-amber-500 h-7 dark:badge-info">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
                </div>
            </a>
        </div>
            @endforeach        
        </div>
    </div>
</div>
<div class="container mx-10 pb-10">
    <a class="text-3xl flex justify-center">FAQ</a>
    <a class="text-2xl flex justify-center mb-5">Frequenly Asked Question</a>
<div class="join join-vertical w-full">
    <div class="collapse collapse-arrow join-item border border-amber-500 dark:border-info">
      <input type="checkbox" name="my-accordion-4" />
      <div class="collapse-title text-xl font-medium">Bagaimana cara membuat akun?</div>
      <div class="collapse-content">
        <p>Klik tombol register dan isi sesuai terserah kalian</p>
      </div>
    </div>
    <div class="collapse collapse-arrow join-item border border-amber-500 dark:border-info">
      <input type="checkbox" name="my-accordion-4" />
      <div class="collapse-title text-xl font-medium">Bagaimana cara mengelola profil?</div>
      <div class="collapse-content">
        <p>Klik pada namakalian di pojok kanan atas pada navbar,klik profile</p>
      </div>
    </div>
    <div class="collapse collapse-arrow join-item border border-amber-500 dark:border-info">
      <input type="checkbox" name="my-accordion-4" />
      <div class="collapse-title text-xl font-medium">Bagaimana cara melaporkan masalah atau penyalahgunaan?</div>
      <div class="collapse-content">
        <p>Klik "Ada masalah" pada navbar lalu laporkan masalah anda</p>
      </div>
    </div>
</div>
  </div></x-app-layout>