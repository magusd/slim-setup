<?php

use Slim\Psr7\Response;

if (! function_exists('response')) {
    /**
     * @param  array<string, string>  $headers
     */
    function response(string $content = '', int $statusCode = 200, array $headers = []): Response
    {
        $response = new Response();
        ($response->getBody())->write($content);

        foreach ($headers as $key => $value) {
            $response = $response->withHeader($key, $value);
        }

        return $response->withStatus($statusCode);
    }
}
