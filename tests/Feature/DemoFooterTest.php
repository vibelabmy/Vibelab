<?php

test('demo page renders merged footer content and enquiry whatsapp link', function () {
    $response = $this->get(route('demo'));

    $response->assertOk();
    $response->assertSee('id="page-transition-root"', false);
    $response->assertSee('data-page-transition-nav', false);
    $response->assertSee('Kolaborasi Kami', false);
    $response->assertSee('Enyfadz Enterprise |', false);
    $response->assertSee('https://wa.me/60197705042', false);
});
