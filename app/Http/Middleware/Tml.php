<?php

namespace App\Http\Middleware;
use Closure;

class Tml {

    public function handle($request, Closure $next) {
//        tml_init([
//            "key" => "6aa4ac2d4a73731a7b45879334a2011bf22024a82dfa34a92f8c286322521179",
//            "source" => [
//                "/recipes\\/[\\d]+\\/edit/" => "/recipes/edit"
//            ],
////            "cache" => [ // shared memcache caching
////                "enabled"                   => true,
////                "adapter"                   => "memcache",
////                "host"                      => "localhost",
////                "namespace"                 => "6aa4ac",
////                "port"                      => 11211,
////                "version_check_interval"    => 30
////            ],
//            "cache" => [ // files based caching
//                "enabled"                   => true,
//                "adapter"                   => "file",
//                "path"                      => storage_path('cache/tml'),
//                "version"                   => "20160708224931"
//            ],
//            "locale" => [
//              "param" => "locale",
//              "strategy" => "pre-path"
//            ],
//            "log" => [
//                "enabled" => true,
//                "path" => storage_path('logs/tml.log')
//            ]
//        ]);

//      Development Environment Configuration

        tml_init([
            "key" => "9fbe39b689f222be9de4222d549403bdd1e7308827cd8404d6ccbfae041d1312",
            "host" => "http://localhost:3000",
            "cdn_host" => "https://trex-snapshots-dev.s3-us-west-1.amazonaws.com",
            "agent" => [
                "host" => "http://localhost:8282/dist/agent.js"
            ],
            "source" => function($original) {
                $fragments = \Tml\Utils\StringUtils::split($original, '/');
                if (count($fragments) > 0 && preg_match('/^[a-z]{2}(-[A-Z]{2,3})?$/', $fragments[0]) == 1) {
                    array_shift($fragments);
                }
                $source = \Tml\Utils\StringUtils::join($fragments, '/');

                if (preg_match("/recipes\\/[\\d]+\\/edit/", $source) == 1)
                    return "/recipes/edit";

                return $source;
            },
            "cache" => [
                "enabled"                   => true,
                "adapter"                   => "memcache",
                "host"                      => "localhost",
                "namespace"                 => "6ca6506b997",
                "port"                      => 11211,
                "version_check_interval"    => 20
            ],
            "locale" => [
                "strategy" => "pre-path",
                "skip_default" => false
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
