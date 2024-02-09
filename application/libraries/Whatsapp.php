<?php

class Whatsapp
{

    public function send_wa($sender, $phone_number, $message)
    {
        $payload = [
            'sender'  => $sender,
            'number'  => $phone_number,
            'message' => $message,
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => SOCKET_URL . 'send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => http_build_query($payload),
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function watzap_send($phone, $message)
    {
        $dataSending               = array();
        $dataSending["api_key"]    = WATZAP_API_KEY;
        $dataSending["number_key"] = WATZAP_NUMBER_KEY;
        $dataSending["phone_no"]   = $phone;
        $dataSending["message"]    = $message;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($dataSending),
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function watzap_send_group($group_id, $message)
    {
        $dataSending               = array();
        $dataSending["api_key"]    = WATZAP_API_KEY;
        $dataSending["number_key"] = WATZAP_NUMBER_KEY;
        $dataSending["group_id"]   = $group_id . "@g.us";
        $dataSending["message"]    = $message;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'https://api.watzap.id/v1/send_message_group',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($dataSending),
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function watzap_get_group()
    {
        $dataSending               = array();
        $dataSending["api_key"]    = WATZAP_API_KEY;
        $dataSending["number_key"] = WATZAP_NUMBER_KEY;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => 'https://api.watzap.id/v1/groups',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($dataSending),
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function filterPhone2($no_tlp)
    {
        $no_hp = "";
        $regex = substr($no_tlp, 0, 2);

        if ($regex === '08') {
            $no_hp .= str_replace("08", "8", $no_tlp);
        } elseif (substr($no_tlp, 0, 4) == "+62-") {
            $no_hp  .= str_replace("+62-", "", $no_tlp);
        } elseif (substr($no_tlp, 0, 3) == "+62") {
            $no_hp  .= str_replace("+62", "", $no_tlp);
        } elseif (substr($no_tlp, 0, 2) == "62") {
            $no_hp  .= str_replace("62", "", $no_tlp);
        } else {
            $no_hp .= '62' . $no_tlp;
        }

        return $no_hp;
    }
}
