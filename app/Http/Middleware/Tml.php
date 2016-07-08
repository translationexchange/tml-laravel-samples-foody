<?php

namespace App\Http\Middleware;
use Closure;

class Tml {

    public function handle($request, Closure $next) {
//        tml_init([
//            "key" => "76e8b8c5b412f65584ccb10ff596f954c6a6b9e1a2823690a9ce95ef63ae86cd",
//            "cache" => [
//                "enabled"                   => false,
//                "adapter"                   => "memcache",
//                "host"                      => "localhost",
//                "namespace"                 => "76e8b8c5b",
//                "port"                      => 11211,
//                "version_check_interval"    => 60 * 60 * 1
//            ],
//            "log" => [
//                "enabled" => true,
//                "path" => dirname(__FILE__) . "/../../../log/tml.log"
//            ]
//        ]);

        tml_init([
            "key" => "6ca6506b997de3599460c61960951014fa87daa7e60537c60dd444d487a83174",
            "host" => "http://localhost:3000",
            "cdn_host" => "https://trex-snapshots-dev.s3-us-west-1.amazonaws.com",
            "agent" => [
                "host" => "http://localhost:8282/dist/agent.js"
            ],
            "cache" => [
                "enabled"                   => true,
                "adapter"                   => "memcache",
                "host"                      => "localhost",
                "namespace"                 => "6ca6506b997",
                "port"                      => 11211,
                "version_check_interval"    => 20
            ],
            "log" => [
                "enabled" => true,
                "path" => storage_path('logs/tml.log')
            ]
        ]);

        return $next($request);
    }

    public function terminate($request, $response) {
        tml_complete_request();
    }
}