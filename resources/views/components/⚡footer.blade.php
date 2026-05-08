<?php

use Livewire\Component;

new class extends Component
{
    public string $pageLabel = 'Page | 01';
};
?>

<footer class="border-t border-zinc-200 bg-[#f5f5f5]">
    <div class="mx-auto flex w-full max-w-[1280px] items-center justify-between px-8 py-3 text-xs text-zinc-500 lg:px-14">
        <p>{{ $pageLabel }}</p>

        <div class="h-2 w-28 overflow-hidden rounded-sm bg-zinc-300">
            <div class="h-full w-6 bg-[#b8733a]"></div>
        </div>
    </div>
</footer>