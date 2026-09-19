<x-birthday-layout :title="$title">
    <div
        x-data="birthdayLetter({
            unlocked: true,
            csrf: @js(csrf_token()),
            greeting: @js($greeting),
            title: @js($title),
            message: @js($message),
            from: @js($from),
        })"
    >
        @include('birthday.letter')
    </div>
</x-birthday-layout>
