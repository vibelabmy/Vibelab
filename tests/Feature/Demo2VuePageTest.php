<?php

test('demo2 page mounts vue root', function () {
    $response = $this->get(route('demo2'));

    $response->assertOk();
    $response->assertSee('id="demo2-app"', false);
});
