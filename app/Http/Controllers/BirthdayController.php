<?php

namespace App\Http\Controllers;

use App\Http\Requests\BirthdayLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class BirthdayController extends Controller
{
    public function create(): View
    {
        return view('birthday.login');
    }

    public function store(BirthdayLoginRequest $request): JsonResponse|RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->expectsJson()) {
            return response()->json($this->cardPayload());
        }

        return redirect()->intended(route('birthday.card', absolute: false));
    }

    public function show(): View
    {
        Gate::authorize('viewBirthdayCard');

        return view('birthday.card', $this->cardPayload());
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('birthday.login');
    }

    /**
     * @return array{greeting: string, title: string, message: string, from: string, csrf: string}
     */
    private function cardPayload(): array
    {
        return [
            'greeting' => (string) config('birthday.greeting'),
            'title' => (string) config('birthday.title'),
            'message' => (string) config('birthday.message'),
            'from' => (string) config('birthday.from'),
            'csrf' => csrf_token(),
        ];
    }
}
