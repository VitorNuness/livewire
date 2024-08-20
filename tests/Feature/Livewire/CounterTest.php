<?php

use App\Livewire\Counter;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

it('should be render', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('counter'))
        ->assertOk();
});

test('component exists on the page', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('counter'))
        ->assertSeeLivewire(Counter::class);
});

it('should start with zero', function () {
    livewire(Counter::class)
        ->assertSee(0);
});

it('can be increment', function () {
    livewire(Counter::class)
        ->call('increment')
        ->assertSee(1);
});

it('can be decremented', function () {
    livewire(Counter::class)
        ->call('decrement')
        ->assertSee(-1);
});
