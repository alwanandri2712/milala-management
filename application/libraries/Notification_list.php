<?php

class Notification_list
{
    private $CI;
    function __construct()
    {
        $this->CI = &get_instance();
        $this->load->database('default', TRUE);
        return TRUE;
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function insert($to_user_id, $title, $message , $url = null)
    {
        $payload = [
            'to_user_id'   => $to_user_id,
            'title'        => $title,
            'message'      => $message,
            'url'          => $url,
            'created_date' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('notification', $payload);
        // $this->api_model->add('notification', $payload);
    }
}
