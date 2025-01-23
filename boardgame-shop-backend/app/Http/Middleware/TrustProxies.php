<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Az alkalmazás mögött lévő proxy-k címei.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * A fejlécek típusa, amelyeket a proxy-k megbízhatóként kezelnek.
     *
     * @var int
     */
    protected $headers = null;
}
