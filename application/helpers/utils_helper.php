<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generateString')) {
    function generateString($length)
    {
        $result = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $result .= $characters[rand(0, $charactersLength - 1)];
        }
        return $result;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($dateString)
    {
        setlocale(LC_TIME, 'id_ID.utf8');

        $date = new DateTime($dateString);
        $formattedDate = strftime('%A, %B %Y', $date->getTimestamp()); // Menggunakan strftime() untuk memformat tanggal dengan locale yang diatur sebelumnya
        return $formattedDate;
    }
}

// generate number random php with length
if (!function_exists('generateNumber')) {
    function generateNumber($length)
    {
        $result = '';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $result .= $characters[rand(0, $charactersLength - 1)];
        }
        return $result;
    }
}

if (!function_exists('getallheaders')) {
    function getallheaders()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

if (!function_exists('valid_image')) {
    function valid_image($url)
    {
        $headers = @get_headers(@$url, 1);
        if (strpos(@$headers['Content-Type'], 'image/') !== false) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('curl_get')) {
    function curl_get($url, $headers = "")
    {
        $ch = curl_init();
        $options = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $url,
            CURLOPT_TIMEOUT        => 10,
        ];

        if ($headers) {
            $options[CURLOPT_HTTPHEADER] =  $headers;
        }

        curl_setopt_array($ch, $options);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        return $data;
    }
}

if (!function_exists('getToJson')) {
    function getToJson($url, $headers = [])
    {
        $ch = curl_init();
        $options = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $url,
            CURLOPT_TIMEOUT        => 10,
        ];

        if (!empty($headers)) {
            $options[CURLOPT_HTTPHEADER] =  $headers;
        }

        curl_setopt_array($ch, $options);
        $data = json_decode(curl_exec($ch));
        if (empty($data)) {
            toJson404();
        }
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        toJson($data, $code);
    }
}

if (!function_exists('curl_post')) {
    function curl_post($url, $fields, $headers = "")
    {
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode($fields),
                'header' =>  $headers
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}

if (!function_exists('toJson404')) {
    function toJson404()
    {
        $response = [
            "status"  => false,
            "message" => "Not Found",
            "data"    => new stdClass(),
            "meta"    => [
                "header_status_code" => 404
            ]
        ];
        toJson($response);
    }
}

if (!function_exists('curlPostJson')) {
    function curlPostJson($url, $data = array(), $headers = [])
    {
        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        if (!$headers) {
            $headers[] = 'Content-Type: application/json';
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $rest = json_decode(curl_exec($ch));
        curl_close($ch);
        return $rest;
    }
}

if (!function_exists('build_post_fields')) {
    function build_post_fields($data, $existingKeys = '', &$returnArray = [])
    {
        if (($data instanceof CURLFile) or !(is_array($data) or is_object($data))) {
            $returnArray[$existingKeys] = $data;
            return $returnArray;
        } else {
            foreach ($data as $key => $item) {
                build_post_fields($item, $existingKeys ? $existingKeys . "[$key]" : $key, $returnArray);
            }
            return $returnArray;
        }
    }
}

if (!function_exists('curlPost')) {
    function curlPost($url, $data = array(), $headers = [])
    {
        $cURLConnection = curl_init($url);
        // dd($data);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, build_post_fields($data));
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        // Set the content type to application/json
        if ($headers) {
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
        }

        $apiResponse = curl_exec($cURLConnection);
        $jsonArrayResponse = json_decode($apiResponse);
        curl_close($cURLConnection);
        // $apiResponse - available data from the API request
        return $jsonArrayResponse;
    }
}

if (!function_exists('dd')) {
    function dd($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        die;
    }
}

if (!function_exists('responseJson')) {
    function responseJson($response, $code)
    {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($response);
        die;
    }
}

if (!function_exists('toJson')) {
    function toJson($data, $code = 200)
    {
        $response = $data;
        $data = is_array($data) ? json_decode(json_encode($data)) : $data;
        header('Content-Type: application/json');
        http_response_code(!empty($data->meta->header_status_code) ? $data->meta->header_status_code : $code);
        echo json_encode($response);
        die;
    }
}

if (!function_exists('requestJson')) {
    function requestJson()
    {
        $ci = &get_instance();
        $stream_clean = $ci->security->xss_clean($ci->input->raw_input_stream);
        $request = json_decode($stream_clean);
        return $request;
    }
}

if (!function_exists('requestGet')) {
    function requestGet($url)
    {
        $parts = parse_url($url);
        $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);
        $out = "GET " . $parts['path'] . " HTTP/1.1\r\n";
        $out .= "Host: " . $parts['host'] . "\r\n";
        $out .= "Content-Length: 0" . "\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        fclose($fp);
    }
}

if (!function_exists('curlPostJson')) {
    function curlPostJson($url, $data = array(), $headers = [])
    {
        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        if (!$headers) {
            $headers[] = 'Content-Type: application/json';
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $rest = json_decode(curl_exec($ch));
        curl_close($ch);
        return $rest;
    }
}

if (!function_exists('get_image_mime_type')) {
    function get_image_mime_type($image_path)
    {
        $mimes  = array(
            IMAGETYPE_GIF => "image/gif",
            IMAGETYPE_JPEG => "image/jpg",
            IMAGETYPE_PNG => "image/png",
            IMAGETYPE_SWF => "image/swf",
            IMAGETYPE_PSD => "image/psd",
            IMAGETYPE_BMP => "image/bmp",
            IMAGETYPE_TIFF_II => "image/tiff",
            IMAGETYPE_TIFF_MM => "image/tiff",
            IMAGETYPE_JPC => "image/jpc",
            IMAGETYPE_JP2 => "image/jp2",
            IMAGETYPE_JPX => "image/jpx",
            IMAGETYPE_JB2 => "image/jb2",
            IMAGETYPE_SWC => "image/swc",
            IMAGETYPE_IFF => "image/iff",
            IMAGETYPE_WBMP => "image/wbmp",
            IMAGETYPE_XBM => "image/xbm",
            IMAGETYPE_ICO => "image/ico"
        );

        if (($image_type = exif_imagetype($image_path))
            && (array_key_exists($image_type, $mimes))
        ) {
            return $mimes[$image_type];
        } else {
            return FALSE;
        }
    }
}


if (!function_exists('slaap')) {
    function slaap($seconds)
    {
        $seconds = abs($seconds);
        if ($seconds < 1) :
            usleep($seconds * 1000000);
        else :
            sleep($seconds);
        endif;
    }
}

if (!function_exists('requestParam')) {
    function requestParam($url, $key)
    {
        $params = parse_url($url, PHP_URL_QUERY); //parse parameter to string
        $params = str_replace("key={$_GET['key']}", "key={$key}", $params); //replace key gerbangapi to restapi
        return $params;
    }
}

if (!function_exists('http_response_code')) {
    function http_response_code($code = NULL)
    {

        if ($code !== NULL) {

            switch ($code) {
                case 100:
                    $text = 'Continue';
                    break;
                case 101:
                    $text = 'Switching Protocols';
                    break;
                case 200:
                    $text = 'OK';
                    break;
                case 201:
                    $text = 'Created';
                    break;
                case 202:
                    $text = 'Accepted';
                    break;
                case 203:
                    $text = 'Non-Authoritative Information';
                    break;
                case 204:
                    $text = 'No Content';
                    break;
                case 205:
                    $text = 'Reset Content';
                    break;
                case 206:
                    $text = 'Partial Content';
                    break;
                case 300:
                    $text = 'Multiple Choices';
                    break;
                case 301:
                    $text = 'Moved Permanently';
                    break;
                case 302:
                    $text = 'Moved Temporarily';
                    break;
                case 303:
                    $text = 'See Other';
                    break;
                case 304:
                    $text = 'Not Modified';
                    break;
                case 305:
                    $text = 'Use Proxy';
                    break;
                case 400:
                    $text = 'Bad Request';
                    break;
                case 401:
                    $text = 'Unauthorized';
                    break;
                case 402:
                    $text = 'Payment Required';
                    break;
                case 403:
                    $text = 'Forbidden';
                    break;
                case 404:
                    $text = 'Not Found';
                    break;
                case 405:
                    $text = 'Method Not Allowed';
                    break;
                case 406:
                    $text = 'Not Acceptable';
                    break;
                case 407:
                    $text = 'Proxy Authentication Required';
                    break;
                case 408:
                    $text = 'Request Time-out';
                    break;
                case 409:
                    $text = 'Conflict';
                    break;
                case 410:
                    $text = 'Gone';
                    break;
                case 411:
                    $text = 'Length Required';
                    break;
                case 412:
                    $text = 'Precondition Failed';
                    break;
                case 413:
                    $text = 'Request Entity Too Large';
                    break;
                case 414:
                    $text = 'Request-URI Too Large';
                    break;
                case 415:
                    $text = 'Unsupported Media Type';
                    break;
                case 500:
                    $text = 'Internal Server Error';
                    break;
                case 501:
                    $text = 'Not Implemented';
                    break;
                case 502:
                    $text = 'Bad Gateway';
                    break;
                case 503:
                    $text = 'Service Unavailable';
                    break;
                case 504:
                    $text = 'Gateway Time-out';
                    break;
                case 505:
                    $text = 'HTTP Version not supported';
                    break;
                default:
                    exit('Unknown http status code "' . htmlentities($code) . '"');
                    break;
            }

            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

            header($protocol . ' ' . $code . ' ' . $text);

            $GLOBALS['http_response_code'] = $code;
        } else {

            $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
        }

        return $code;
    }
}

/**
 * Calculates the great-circle distance between two points, with
 * the Haversine formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [m]
 * @return float Distance between points in [m] (same as earthRadius)
 */
if (!function_exists('haversineGreatCircleDistance')) {
    function haversineGreatCircleDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
        $earthRadius = 6371000
    ) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
}

if (!function_exists('http_request_get')) {
    function http_request_get($url, $headers, $array = false)
    {
        // persiapkan curl
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        // set user agent
        // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // tutup curl
        curl_close($ch);

        if ($array) {
            $output = json_decode($output, true);
        } else {
            $output = json_decode($output);
        }
        // mengembalikan hasil curl
        return $output;
    }
}

if (!function_exists('array_column_portable')) {
    function array_column_portable($array, $key)
    {
        return array_map(function ($e) use ($key) {
            return is_object($e) ? $e->$key : $e[$key];
        }, $array);
    }
}
