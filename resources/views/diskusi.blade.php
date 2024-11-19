<x-app-layout>
    <div class="flex justify-center m-5 mt-16">
        <div class="lg:grid grid-cols-2">
            @guest
            @else
            <a href="/add" class="btn animate-bounce hover:no-animation btn-info fixed right-4 bottom-4 z-10">Tambahkan Diskusi</a>
            @endguest
        @foreach ($posts as $item)
        <a href="/postingan/{{ $item->id }}" class="card bg-base-300 dark:bg-base-100 w-96 shadow-xl rounded-md" style="margin: 20px">
            <div class="card-body dark:text-white h-auto hover:outline hover:outline-amber-500 rounded-md">
                <h2 class="card-title line-clamp-2 pb-1">
                    {{ $item->judul }}
                </h2>
                <p class="line-clamp-4">{{ $item->deskripsi }}</p>
                <div class="flex justify-between">
                    <div class="">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
                    <div class="flex"><svg class="mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M1.5 4.25c0-.966.784-1.75 1.75-1.75h17.5c.966 0 1.75.784 1.75 1.75v12.5a1.75 1.75 0 0 1-1.75 1.75h-9.69l-3.573 3.573A1.458 1.458 0 0 1 5 21.043V18.5H3.25a1.75 1.75 0 0 1-1.75-1.75ZM3.25 4a.25.25 0 0 0-.25.25v12.5c0 .138.112.25.25.25h2.5a.75.75 0 0 1 .75.75v3.19l3.72-3.72a.75.75 0 0 1 .53-.22h10a.25.25 0 0 0 .25-.25V4.25a.25.25 0 0 0-.25-.25Z"/></svg> {{$item->comments_count}}</div>
                </div>
            </div>
        </a>
        @endforeach
      </div>
    </div> 
</x-app-layout>