<x-birthday-layout title="Untukmu">
    <div
        x-data="birthdayLetter({
            unlocked: false,
            csrf: @js(csrf_token()),
            loginUrl: @js(route('birthday.login.store')),
            cardUrl: @js(route('birthday.card')),
        })"
    >
        <div class="flex min-h-screen items-center justify-center px-4 py-12" x-show="! unlocked">
            <section class="birthday-panel w-full max-w-md px-8 py-10 sm:px-10">
                <p class="text-center font-script text-5xl text-[#8b3a4a] sm:text-6xl">Untukmu</p>
                <div class="mx-auto mt-4 h-px w-24 bg-gradient-to-r from-transparent via-[#c9a36b] to-transparent"></div>
                <p class="mt-5 text-center font-serif text-lg leading-relaxed text-[#5c3340]">
                    A letter is waiting behind this little door.
                    Enter the key I made only for you.
                </p>

                <form
                    method="POST"
                    action="{{ route('birthday.login.store') }}"
                    class="mt-8 flex flex-col gap-5"
                    @submit.prevent="submitLogin"
                >
                    @csrf

                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-sm tracking-[0.18em] uppercase text-[#8b3a4a]/80">Your name</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-full border border-[#c9a36b]/50 bg-[#fffaf5]/90 px-5 py-3 text-[#3d1f2b] shadow-inner outline-none transition focus:border-[#8b3a4a] focus:ring-2 focus:ring-[#c9a36b]/40"
                        >
                        <ul class="mt-1 space-y-1 text-sm text-red-600" x-show="errors.name" x-cloak>
                            <template x-for="error in (errors.name || [])" :key="error">
                                <li x-text="error"></li>
                            </template>
                        </ul>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-sm tracking-[0.18em] uppercase text-[#8b3a4a]/80">Secret word</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-full border border-[#c9a36b]/50 bg-[#fffaf5]/90 px-5 py-3 text-[#3d1f2b] shadow-inner outline-none transition focus:border-[#8b3a4a] focus:ring-2 focus:ring-[#c9a36b]/40"
                        >
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <label for="remember_me" class="flex items-center gap-3 text-sm text-[#5c3340]">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded-full border-[#c9a36b] text-[#8b3a4a] shadow-sm focus:ring-[#c9a36b]"
                        >
                        Keep this door open for me
                    </label>

                    <button
                        type="submit"
                        class="mt-2 w-full rounded-full bg-gradient-to-r from-[#6b2d3c] via-[#8b3a4a] to-[#6b2d3c] px-6 py-3 font-serif text-lg tracking-wide text-[#fbf4ee] shadow-[0_12px_30px_rgba(107,45,60,0.35)] transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#c9a36b] focus:ring-offset-2 focus:ring-offset-[#fbf4ee]"
                        :disabled="submitting"
                    >
                        Open the door
                    </button>
                </form>
            </section>
        </div>

        @include('birthday.letter')
    </div>
</x-birthday-layout>
