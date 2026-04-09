<?php

use App\Models\Team;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->ready()->create();

    $this->actingAs($user);

    #sample

    $response = $this->get(route('dashboard'));
    $response->assertStatus(200);
});
