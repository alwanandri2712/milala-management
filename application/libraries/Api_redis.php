<?php


class Api_redis
{

    public function __construct()
    {
        $this->ci                 = &get_instance();
        $this->url_redis          = 'https://redis.kamideveloper.com/domain/milala.kamideveloper.com/connection_factory/';
        $this->connection_factory =  'conn_task';
    }

    public function insert_connection($connection_factory = '',$data = array())
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $this->url_redis . $connection_factory,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => http_build_query(['data' => $data])
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
