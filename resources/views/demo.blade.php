@extends('layouts.master')

@section('content')
    <section class="mx-auto w-full max-w-[1280px] px-8 py-16 lg:px-14">
        <h1 class="text-4xl font-semibold tracking-wide text-zinc-900">Demo Landing</h1>
        <p class="mt-3 max-w-2xl text-lg text-zinc-700">
            Guna butang bawah untuk buka setiap halaman yang sudah dibuat.
        </p>

        <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('demo') }}" class="rounded-lg bg-zinc-900 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white hover:bg-zinc-800">
                Utama
            </a>
            <a href="{{ route('pakej') }}" class="rounded-lg bg-zinc-900 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white hover:bg-zinc-800">
                Pakej
            </a>
            <a href="{{ route('demo') }}" class="rounded-lg bg-zinc-900 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white hover:bg-zinc-800">
                Menu
            </a>
            <a href="{{ route('tentang_kami') }}" class="rounded-lg bg-zinc-900 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white hover:bg-zinc-800">
                Tentang Kami
            </a>
            <a href="{{ route('hubungi_kami') }}" class="rounded-lg bg-zinc-900 px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white hover:bg-zinc-800">
                Hubungi Kami
            </a>
        </div>
    </section>
@endsection
