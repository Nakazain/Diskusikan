<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-16">
            Selamat datang
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat datang {{ Auth::user()->name }}<br>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto lg:columns-2 md:columns-1 gap-3 mt-3 sm:px-6 lg:px-8">
            <div class="mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:mb-3 sm:mb-3">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-gray-400">Jumlah Diskusi yang kamu posting</p>
                        <p class="text-4xl">{{ $jumlah }}</p>
                        <a href="/add" class="animate-bounce btn btn-info fixed right-4 bottom-4 z-10">Tambahkan Diskusi</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-gray-400">Jumlah pendapat yang diberikan</p>
                        <p class="text-4xl">{{ $comtot }}</p> 
                   </div>
                </div>
            </div>
            </div>    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100 text-center">
                    Diskusi yang kamu posting<br>
                    @if ($jumlah == '0')
                        <p>Kamu belum memposting apapun</p>
                    @endif
                </div>
                <div class="flex justify-center p-4 -mt-6">
                    <div class="lg:grid grid-cols-2">
                    @foreach ($posts as $item)
                    <div class="card bg-base-100 w-96 shadow-xl rounded-md" style="margin: 20px">
                        <div class="card-body text-white">
                            <p>{{ \Carbon\Carbon::now()->locale('id')->isoFormat(' ddd, D MMMM Y ')}}</p>
                            <h2 class="card-title line-clamp-1">
                                {{ $item->judul }}
                            </h2>
                            <p class="line-clamp-2">{{ $item->deskripsi }}</p>
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
            </div>
        </div>
    </div> 

</x-app-layout>
