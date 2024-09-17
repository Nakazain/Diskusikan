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
                    <!-- Tanggal Postingan -->
                    <div class="text">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>

                    <!-- Tombol Lihat Postingan -->
                    <a href="/postingan/{{ $item->id }}" class="btn btn-info"> Lihat</a>

                    <!-- Tombol Hapus Postingan -->
                    <button class="btn btn-sm w-full btn-error" onclick="document.getElementById('hapus-{{ $item->id }}').showModal()">Hapus</button>

                    <!-- Modal Hapus -->
                    <dialog id="hapus-{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Yakin mau hapus?</h3>
                            <p class="py-4">Anda akan menghapus postingan ini secara permanen, Anda yakin?</p>
                            <div class="modal-action">
                                <!-- Tombol Batal -->
                                <form method="dialog">
                                    <button class="btn btn-warning">Gajadi deh</button>
                                </form>
                                <!-- Tombol Hapus dengan Form -->
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
