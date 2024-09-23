<x-app-layout>
    <div class="flex justify-center m-5 mt-16">
        <div class="grid grid-cols-2">
            <a href="/admin/add" class="btn btn-outline btn-info fixed right-4 bottom-4">Tambahkan Diskusi</a>
            @foreach ($posts as $item)
            <div class="card bg-base-100 w-96 shadow-xl rounded-md" style="margin: 20px">
                <div class="card-body text-white">
                    <h2 class="card-title line-clamp-1">
                        {{ $item->judul }}
                    </h2>
                    <p class="line-clamp-4">{{ $item->deskripsi }}</p>
                    <div class="flex justify-between">
                        <div class="text">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
                        <div class="flex"><svg class="mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M1.5 4.25c0-.966.784-1.75 1.75-1.75h17.5c.966 0 1.75.784 1.75 1.75v12.5a1.75 1.75 0 0 1-1.75 1.75h-9.69l-3.573 3.573A1.458 1.458 0 0 1 5 21.043V18.5H3.25a1.75 1.75 0 0 1-1.75-1.75ZM3.25 4a.25.25 0 0 0-.25.25v12.5c0 .138.112.25.25.25h2.5a.75.75 0 0 1 .75.75v3.19l3.72-3.72a.75.75 0 0 1 .53-.22h10a.25.25 0 0 0 .25-.25V4.25a.25.25 0 0 0-.25-.25Z"/></svg> {{$item->comments_count}}</div>
                    </div>
                    <a href="/postingan/{{ $item->id }}" class="btn btn-info"> Lihat</a>
                    <button class="btn btn-sm w-full btn-error" onclick="document.getElementById('hapus-{{ $item->id }}').showModal()">Hapus</button>
                    <dialog id="hapus-{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Yakin mau hapus?</h3>
                            <p class="py-4">Anda akan menghapus postingan ini secara permanen, Anda yakin?</p>
                            <div class="modal-action">
                                <!-- Tombol Batal -->
                                <form method="dialog">
                                    <button class="btn btn-warning">Gajadi deh</button>
                                </form>
                                <form action="{{ route('admin.postingan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-error">Tentu</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
