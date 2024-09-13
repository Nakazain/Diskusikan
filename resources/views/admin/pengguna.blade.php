<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-16">
            List pengguna
        </h2>
    </x-slot>
    <div class="container mx-auto mt-6 px-7">
    <div class="overflow-x-auto text-white">
        <table class="table">
          <!-- head -->
          <thead>
            <tr class="bg-gray-800 text-slate-300 text-base">
              <th>Id</th>
              <th>Name</th>
              <th>Tipe User</th>
              <th>Dibuat pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
            <tr>
              <th>{{$item->id}}</th>
              <th>{{$item->name}}</th>
              <th>{{$item->usertype}}</th>
              <th>{{$item->created_at}}</th>
              <th><a href="/hapususer/{{$item->id}}" class="btn btn-error btn-sm">Hapus Akun</a></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-app-layout>