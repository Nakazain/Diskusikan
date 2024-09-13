<x-app-layout>
    <div class="flex justify-center m-5 mt-16">
        <div class="grid grid-cols-2">
            <a href="/add" class="btn btn-outline btn-info fixed right-4 bottom-4">Tambahkan Diskusi</a>
        @foreach ($posts as $item)
        <a href="/postingan/{{ $item->id }}" class="card bg-base-100 w-96 shadow-xl rounded-md" style="margin: 20px">
            <div class="card-body text-white h-64 hover:outline rounded-sm">
                <h2 class="card-title line-clamp-2 pb-1">
                    {{ $item->judul }}
                </h2>
                <p class="line-clamp-4">{{ $item->deskripsi }}</p>
                <div class="badge badge-info">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
            </div>
        </a>
        @endforeach
      </div>
    </div> 
</x-app-layout>