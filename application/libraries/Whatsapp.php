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
            CURLOPT_URL            => SOCKET_URL.'send-message',
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
