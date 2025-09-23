<?php

use App\Models\User;
use Livewire\Livewire;

test('profile page is displayed', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get(route('settings.profile'))->assertOk();
});

test('profile information can be updated', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('profile.update-profile-information-form')
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->call('updateProfileInformation');

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});

test('email verification status is unchanged when email address is unchanged', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('profile.update-profile-information-form')
        ->set('name', 'Test User')
        ->set('email', $user->email)
        ->call('updateProfileInformation');

    $this->assertNotNull($user->refresh()->email_verified_at);
});

test('user can delete their account', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('profile.delete-user-form')
        ->set('password', 'password')
        ->call('deleteUser');

    $this->assertGuest();
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});

test('correct password must be provided to delete account', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('profile.delete-user-form')
        ->set('password', 'wrong-password')
        ->call('deleteUser')
        ->assertHasErrors('password');

    $this->assertNotNull($user->fresh());
});
