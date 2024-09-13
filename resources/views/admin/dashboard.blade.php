<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-16">
            Selamat datang
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Ini halamanadmin
                    Selamat datang {{ Auth::user()->name }}<br>
                    <p>Jumlah postinganmu = {{ $jumlah }}</p>
                    <a href="/admin/add" class="btn btn-outline btn-info fixed right-4 bottom-4">Tambahkan Diskusi</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100 text-center">
                    Postingan yang kamu posting<br>
                    <a href="/admin/add" class="btn btn-outline btn-info fixed right-4 bottom-4">Tambahkan Diskusi</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center p-4 -mt-14">
        <div class="grid grid-cols-2">
        @foreach ($posts as $item)
        <div class="card bg-base-100 w-96 shadow-xl rounded-md" style="margin: 20px">
            <div class="card-body text-white">
                <div class="badge badge-info">{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</div>
                <h2 class="card-title line-clamp-1">
                    {{ $item->judul }}
                </h2>
                <p class="line-clamp-4">{{ $item->deskripsi }}</p>
                <a href="/postingan/{{ $item->id }}" class="btn btn-info"> Lihat</a>
                    <button class="btn btn-sm w-full btn-error" onclick="document.getElementById('hapus-{{ $item->id }}').showModal()">Hapus</button>
                    <dialog id="hapus-{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                          <h3 class="text-lg font-bold">Yakin mau hapus</h3>
                          <p class="py-4">Anda akan menghapus postingan in secara permanen, Anda yakin?</p>
                          <div class="modal-action">
                             <form method="dialog">
                            <button class="btn btn-warning">Gajadi deh</button>
                             </form>
                            <form action="{{ route('postingan.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                              <button class="btn btn-error">Tentu</button>
                            </form>
                          </div>
                        </div>
                      </dialog>
                    </form>            
            </div>
        </div>
        @endforeach
      </div>
    </div> 

</x-app-layout>
