<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-16">
            Masalah pengguna
        </h2>
    </x-slot>
    <div class="container mx-auto mt-6 px-7">
    <div class="overflow-x-auto text-white">
        <table class="table">
          <!-- head -->
          <thead>
            <tr class="bg-gray-800 text-slate-300 text-base">
              <th>Nama pelapor</th>
              <th>Judul masalah</th>
              <th>Deskripsi masalah</th>
              <th>Dilaporkan pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
            <tr>
              <th>{{$item->username}}</th>
              <th>{{$item->judul}}</th>
              <th>{{$item->deskripsi}}</th>
              <th>{{$item->created_at}}</th>
              <th><a href="/hapusmasalah/{{$item->id}}" class="btn btn-warning btn-sm">Selesai</a></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-app-layout>