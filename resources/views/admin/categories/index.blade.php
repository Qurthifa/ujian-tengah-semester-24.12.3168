@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Atur kategori event Anda di sini.')

@section('content')
<div class="mb-8 pl-1">
    <h2 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Kategori  :3</h2>
    <p class="text-sm text-slate-400 mt-1">cari, tambah, atau perbarui seluruh Kategori Event.</p>
</div>

{{-- Action Top Bar --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-4 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
    
    {{-- Search --}}
    <form action="{{ route('admin.categories.index') }}" method="GET" class="w-full sm:w-auto">
        {{-- Search Input Modern: Posisi ikon kaca pembesar diletakkan di sisi kiri input --}}
        <div class="relative w-full sm:w-80 group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-indigo-500 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari kategori..."
                   class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-slate-700 placeholder-slate-400 text-sm font-semibold focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200">
            
            <button type="submit" class="hidden"></button>
        </div>
    </form>

    {{-- Tombol Tambah --}}
    <div class="text-right shrink-0">
        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-md hover:shadow-lg hover:shadow-indigo-600/20 active:scale-95 transition-all duration-200 text-sm whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Tambah Kategori
        </a>
    </div>

</div>

{{-- Tabel Utama Kategori--}}
<div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">

    <div class="overflow-x-auto">

         <table class="w-full text-left border-collapse">

            <thead class="bg-slate-50/70 border-b border-slate-100 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-20 text-center">No</th>
                    <th class="px-6 py-4">Nama Kategori</th>
                    <th class="px-6 py-4">Slug</th>
                    <th class="px-8 py-4 w-40 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-50">

                @forelse($categories as $category)

                <tr class="hover:bg-slate-50/50 transition-colors duration-200 group">

                    {{-- Nomor Urut --}}
                    <td class="px-8 py-5 font-bold text-slate-400 text-center text-sm">
                        {{ $loop->iteration }}
                    </td>

                    {{-- Nama Kategori --}}
                    <td class="px-6 py-5">
                        <p class="font-black text-slate-800 text-base tracking-tight group-hover:text-indigo-600 transition-colors duration-200">
                            {{ $category->name }}
                        </p>
                    </td>

                    {{-- Slug Kategori --}}
                    <td class="px-6 py-5">
                        <span class="text-xs text-slate-500 font-mono font-medium bg-slate-50 border border-slate-100 px-2 py-1 rounded-md inline-block">
                            {{ $category->slug }}
                        </span>
                    </td>

                    {{-- Tombol Aksi (Edit & Hapus) --}}
                    <td class="px-8 py-5 text-center">

                        <div class="flex justify-center items-center gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="inline-flex items-center justify-center w-9 h-9 bg-slate-50 hover:bg-indigo-50 text-slate-500 hover:text-indigo-600 border border-slate-200 hover:border-indigo-200 rounded-xl active:scale-90 transition-all duration-200"
                               title="Edit Kategori">

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>

                            </a>

                            {{-- Hapus --}}
                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin hapus kategori ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="inline-flex items-center justify-center w-9 h-9 bg-slate-50 hover:bg-rose-50 text-slate-500 hover:text-rose-600 border border-slate-200 hover:border-rose-200 rounded-xl active:scale-90 transition-all duration-200"
                                        title="Hapus Kategori">

                                    <svg class="w-4 h-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-medium text-sm">
                        Belum ada data kategori resmi yang tersedia.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection