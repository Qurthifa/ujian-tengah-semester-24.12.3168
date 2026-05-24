@extends('layouts.admin')

@section('content')

<main class="flex-1 p-10 overflow-y-auto">
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-black">Kelola Event</h1>
                <p class="text-slate-500 font-medium">Buat dan atur acara seru Anda di sini.</p>
            </div>
            <button
                class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                + Tambah Event Baru
            </button>
        </header>
        </main>

@endsection