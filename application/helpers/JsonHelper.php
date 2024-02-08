<?php

namespace Application\Helper;

class JsonHelper
{
    public static function toJson(array $response, int $code, int $extention = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES): void
    {
        $response = is_array($response) ? json_decode(json_encode($response)) : $response;
        header('Content-Type: application/json');
        http_response_code(!empty($response->meta->header_status_code) ? $response->meta->header_status_code : $code);
        echo json_encode($response, $extention);
        die;
    }
}
