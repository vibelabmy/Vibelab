<?php

use App\Models\User;
use Database\Seeders\BirthdayUserSeeder;

test('the birthday login screen can be rendered', function () {
    $this->get(route('birthday.login'))
        ->assertOk()
        ->assertSee('Untukmu', false)
        ->assertSee('Your name', false)
        ->assertSee('Open the door', false)
        ->assertDontSee('Secret email', false)
        ->assertSee(config('birthday.song.title'), false)
        ->assertSee(config('birthday.song.artist'), false)
        ->assertSee(config('birthday.song.youtube_id'), false)
        ->assertSee('data-start-seconds="'.config('birthday.song.start_seconds').'"', false);
});

test('guests are redirected from the birthday card to the birthday login', function () {
    $this->get(route('birthday.card'))
        ->assertRedirect(route('birthday.login'));
});

test('the birthday login accepts only the recipient credentials', function () {
    User::factory()->birthdayRecipient()->create();

    $this->post(route('birthday.login.store'), [
        'name' => config('birthday.name'),
        'password' => config('birthday.password'),
    ])->assertRedirect(route('birthday.card'));

    $this->assertAuthenticated();
});

test('json birthday login returns the letter without leaving the page', function () {
    User::factory()->birthdayRecipient()->create();

    $this->postJson(route('birthday.login.store'), [
        'name' => config('birthday.name'),
        'password' => config('birthday.password'),
    ])->assertOk()
        ->assertJson([
            'greeting' => config('birthday.greeting'),
            'title' => config('birthday.title'),
            'message' => config('birthday.message'),
            'from' => config('birthday.from'),
        ])
        ->assertJsonStructure(['csrf']);

    $this->assertAuthenticated();
});

test('other users cannot open the birthday login even with valid accounts', function () {
    $user = User::factory()->create();

    $this->post(route('birthday.login.store'), [
        'name' => $user->name,
        'password' => 'password',
    ])->assertSessionHasErrors('name');

    $this->assertGuest();
});

test('invalid birthday credentials are rejected', function () {
    User::factory()->birthdayRecipient()->create();

    $this->post(route('birthday.login.store'), [
        'name' => config('birthday.name'),
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('name');

    $this->assertGuest();
});

test('the recipient can view the envelope and birthday message', function () {
    $user = User::factory()->birthdayRecipient()->create();

    $this->actingAs($user)
        ->get(route('birthday.card'))
        ->assertOk()
        ->assertSee('birthday-envelope', false)
        ->assertSee('Tekan surat ni sayang hehe', false)
        ->assertSee(config('birthday.greeting'), false)
        ->assertSee(config('birthday.title'), false)
        ->assertSee('Happy belated birthday sayangggg', false)
        ->assertSee('p.s shiap shiapp esokk mwahh', false)
        ->assertSee(config('birthday.song.title'), false)
        ->assertSee(config('birthday.song.artist'), false)
        ->assertSee(config('birthday.song.youtube_id'), false);
});

test('other authenticated users cannot view the birthday card', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('birthday.card'))
        ->assertForbidden();
});

test('the birthday recipient is sent to the card after the main login', function () {
    User::factory()->birthdayRecipient()->create();

    $this->post('/login', [
        'email' => config('birthday.email'),
        'password' => config('birthday.password'),
    ])->assertRedirect(route('birthday.card', absolute: false));
});

test('the birthday recipient can log out back to the birthday login', function () {
    $user = User::factory()->birthdayRecipient()->create();

    $this->actingAs($user)
        ->post(route('birthday.logout'))
        ->assertRedirect(route('birthday.login'));

    $this->assertGuest();
});

test('the birthday user seeder creates the recipient account', function () {
    $this->seed(BirthdayUserSeeder::class);

    expect(User::query()->where('email', config('birthday.email'))->first())
        ->not->toBeNull()
        ->name->toBe(config('birthday.name'));
});
