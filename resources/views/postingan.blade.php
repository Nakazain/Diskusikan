<x-app-layout>
    <div class="flex justify-center ml-20 mr-20 mt-20 text-white">
      <div class="col w-full">
        <div class="card bg-base-100 w-full shadow-xl rounded-md">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                  {{ $post->judul }}
                </h2>
                <div class=" text-sm">Diposting Oleh {{$post->username}} Pada {{ \Carbon\Carbon::now()->locale('id')->isoFormat(' dddd, D MMMM Y | hh:mm')}}<a> WIB</a></div>
                {{-- <a href="https://api.whatsapp.com/send?text={{$post->judul}} localhost:8000/postingan/{{$post->id}}" class="btn btn-info rounded-full w-1/4 ">
                  Bagikan ke<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/></svg>
                  Whatsapp
                </a> --}}
                @if ($post->image == 'kosong')
                @else
                <img src="/storage/{{$post->image}}" class="rounded-lg w-4/6 mt-4">
                 @endif
                <p class="text-lg mt-4">{{ $post->deskripsi }}</p>
            </div>
          </div>
            <div class="card bg-base-100 w-full shadow-xl mt-6 rounded-md mb-10">
              <div class="card-body">
                <p class="card-title text-2xl">Berikan pendapatmu</p>
                <div class="justify-start">
                      @auth
                      <form method="POST" action="{{ route('postingan.comment', $post->id) }}" class="w-full">
                          @csrf
                          <x-comment-form 
                          :action="route('postingan.comment', $post->id)" 
                          method="POST"
                          buttonText="Kirim Komentar"
                          placeholder="Tulis komentar Anda..."/>
                        </form>
                      @else
                      <p>Untuk memberikan pendapat silakan <a class="link hover:text-gray-400" href="/login">Log in</a> terlebih dahulu</p>
                      @endauth
                      <p class="text-2xl font-bold mt-10">Pendapat orang lain</p>
                      @foreach ($comments as $comment)
                      <div class="mx-auto border border-info px-6 py-4 rounded-lg my-5">
                        <div class="flex items-center mb-3"><div>
                                <div class="text-lg font-medium text-white">{{ $comment->username }}</div>
                                <div class="text-gray-500">{{ \Carbon\Carbon::parse($comment->created_at)->locale('id')->diffForHumans()}}</div>
                            </div>
                        </div>
                        <p class="text-lg leading-relaxed mb-3">{{ $comment->comment }}</p>
                        <div class="flex justify-end items-center">
                            <div class="flex items-center">
                              @guest
                              @else
                              @if(Auth::check() && Auth::id() === $comment->user_id || Auth::user()->usertype == 'admin')
                              <button class="text text-red-500 hover:text-gray-700" onclick="document.getElementById('hapusmd-{{ $comment->id }}').showModal()">Hapus</button>
                              <dialog id="hapusmd-{{ $comment->id }}" class="modal modal-bottom sm:modal-middle">
                                <div class="modal-box">
                                  <h3 class="text-lg font-bold">Apakah Anda Yakin?</h3>
                                  <p class="py-4">Apakah anda yakin ingin menghapus komentar ini</p>
                                  <div class="modal-action">
                                    <form method="dialog">
                                      <button class="btn btn-warning">Ga jadi</button>
                                    </form>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-error">Hapus</button>
                                    </form>
                                  </div>
                                </div>
                              </dialog>
                          @endif
                          @endguest
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
          </div>
      </div>
</x-app-layout>