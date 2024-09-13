<x-app-layout>
     
    <center class="mt-44 text-white">
        <h1 class="text font-bold text-5xl">Selamat datang di Diskusikan</h1>
        <P class="text text-xl mt-1 mb-10">Diskusikan adalah sebuah aplikai untuk berdiskusi tentang sebuah topik apapun</P>
        @guest
        <p>Login terlebih dahulu</p>
        <a href="/login" class="btn btn-outline btn-info m-2">Log in</a>
        <a href="/register" class="btn btn-outline btn-info">Register</a>
        @else
        <a href="/dashboard" class="btn btn-outline btn-info mr-2">Dashboard</a>
        <a href="/add" class="btn btn-outline btn-info">Tambah Postingan</a>
        @endguest
        
    </center>
    <div class="m-20 mt-40">
        <div class="grid grid-cols-2 gap-10">
            <div>
            <p class="text-3xl">Halo</p>
            <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit minus eum distinctio perspiciatis nisi fugiat. Voluptate adipisci ratione architecto debitis perferendis libero ab ex. Quaerat odio nostrum dolores laboriosam officiis.</p>
        </div>
        <div class="mb-20">
            <p class="text-2xl">Beberapa contoh postingan</p>
            @foreach ($posts as $item)
            <div class="grid grid-cols-1">
            <a href="/postingan/{{ $item->id }}" class="card bg-base-100 w-full shadow-xl rounded-md mt-5">
                <div class="card-body text-white h-full hover:outline rounded-sm">
                    <h2 class="card-title line-clamp-2 pb-1">
                        {{ $item->judul }}
                    </h2>
                    <p class="line-clamp-3">{{ $item->deskripsi }}</p>
                    <div class="badge badge-info">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
                </div>
            </a>
        </div>
            @endforeach        
        </div>
    </div>
</div>

</x-app-layout>