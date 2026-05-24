@extends('layouts.admin')

@section('title', 'Edit Partner - Admin')

@section('content')
{{-- Card Utama --}}
<div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
    <div class="mb-8">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Edit Data Partner</h2>
        <p class="text-sm text-slate-400 mt-1">Perbarui nama atau alamat tautan logo partner resmi</p>
    </div>

    {{-- Form Edit Partner --}}
    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        {{-- Input Nama Partner --}}
        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-700 tracking-wide">Nama Partner</label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" placeholder="Contoh: Universitas Amikom" 
                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200">
            @error('name') <p class="text-rose-500 text-xs mt-1.5 font-semibold pl-1">{{ $message }}</p> @enderror
        </div>

        {{-- Input Logo URL --}}
        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-700 tracking-wide">Logo URL</label>
            <input type="url" name="logo_url" value="{{ old('logo_url', $partner->logo_url) }}" placeholder="Contoh: https://images.unsplash.com/photo-12345" 
                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200">
            <span class="text-xs text-slate-400 font-medium flex items-center gap-1 mt-1.5 pl-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Ubah atau tempel tautan link gambar logo partner dari internet yang baru.
            </span>
            @error('logo_url') <p class="text-rose-500 text-xs mt-1.5 font-semibold pl-1">{{ $message }}</p> @enderror
        </div>

        {{-- PREVIEW LOGO --}}
        <div class="space-y-2 pt-2">
            <label class="block text-sm font-bold text-slate-700 tracking-wide">Preview Logo Saat Ini</label>
            <div class="w-32 h-32 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex items-center justify-center p-3 transition-all duration-300 group hover:border-indigo-500/50">
                <div class="w-full h-full bg-white border border-slate-100 rounded-xl flex items-center justify-center shadow-sm overflow-hidden p-2">
                    <img src="{{ $partner->logo_url }}" 
                         alt="{{ $partner->name }}" 
                         class="max-h-full max-w-full object-contain transition-transform duration-300 group-hover:scale-105">
                </div>
            </div>
        </div>

        {{-- Garis Pembatas --}}
        <hr class="border-slate-100 my-6">

        {{-- Tombol Aksi --}}
        <div class="flex gap-3 justify-end pt-2">
            <a href="{{ route('admin.partners.index') }}" 
               class="px-5 py-2.5 bg-slate-100 text-slate-500 rounded-xl font-bold text-sm hover:bg-slate-200 active:scale-95 transition-all duration-200 flex items-center justify-center">
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 active:scale-95 shadow-md hover:shadow-lg hover:shadow-indigo-600/20 shadow-indigo-600/10 transition-all duration-200">
                Perbarui Partner
            </button>
        </div>
    </form>
</div>
@endsection