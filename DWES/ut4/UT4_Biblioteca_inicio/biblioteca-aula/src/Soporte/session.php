<?php

declare(strict_types=1);

namespace App\Soporte;

function inicarSesion(): void {
    session_name('biblioteca');
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies');
    session_start([
        'cookie_path' => '/',
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
        'cookie_secure' => false
    ]);
}