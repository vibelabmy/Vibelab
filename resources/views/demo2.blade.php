@extends('layouts.master')

@section('content')
    <section class="mx-auto w-full max-w-[1280px] px-8 py-16 lg:px-14">
        <h1 class="text-4xl font-semibold tracking-wide text-zinc-900">Demo 2</h1>
        <p class="mt-3 max-w-2xl text-lg text-zinc-700">
            Ini adalah halaman demo kedua untuk ujian paparan.
        </p>

        <div class="mt-10">
            <x-demo2 />
        </div>
    </section>
@endsection
