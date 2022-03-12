<?php

namespace Phpmvc\Src\Core;

/**
 *
 */
class Response
{
    /**
     * @param int $response
     * @return void
     */
    public function setStatusCode(int $response): void
    {
        http_response_code($response);
    }
}