@extends('layouts.admin')

@section('title', 'Tambah Kategori - Admin')
@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Tambahkan kategori event baru.')

@section('content')

{{-- Card Utama --}}
<div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
    
    {{-- Header Form internal --}}
    <div class="mb-8">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Tambah Kategori Baru</h2>
        <p class="text-sm text-slate-400 mt-1">Lengkapi informasi di bawah untuk mendaftarkan kategori event baru.</p>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">

        @csrf

        {{-- Input Nama Kategori --}}
        <div class="space-y-2">

            <label class="block text-sm font-bold text-slate-700 tracking-wide">
                Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   placeholder="Contoh: Seminar Teknologi"
                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                   required>

        </div>

        {{-- Garis Pembatas Ringan --}}
        <hr class="border-slate-100 my-6">

        {{-- Tombol Aksi--}}
        <div class="flex justify-end gap-3 pt-2">

            <a href="{{ route('admin.categories.index') }}"
               class="px-5 py-2.5 bg-slate-100 text-slate-500 rounded-xl font-bold text-sm hover:bg-slate-200 active:scale-95 transition-all duration-200 flex items-center justify-center">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 active:scale-95 shadow-md hover:shadow-lg hover:shadow-indigo-600/20 shadow-indigo-600/10 transition-all duration-200">
                Simpan Kategori
            </button>

        </div>

    </form>

</div>

@endsection