<?php


class Cron extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function send_whatsapp()
    {
        $sql_pesan_terjadwal = $this->db->query("SELECT * FROM pesan_jadwal WHERE status = 'menunggu_jadwal' ORDER BY id_pesan_jadwal ASC")->result();
        $date_now            = strtotime(date("Y-m-d H:i:s"));
        foreach ($sql_pesan_terjadwal as $key => $value) {
            $pesan_terjadwal = strtotime($value->jadwal);
            if ($pesan_terjadwal <= $date_now) {
                $sender  = $value->sender_wa;
                $no_tlpn = $value->no_telp;
                $pesan   = $value->pesan;

                $send = $this->whatsapp->send_wa($sender, $no_tlpn, $pesan);
                $send = json_decode($send);
                if ($send->message == "terkirim") {
                    $update_status = $this->db->query("UPDATE pesan_jadwal SET status = 'terkirim' WHERE id_pesan_jadwal = '$value->id_pesan_jadwal'");
                    echo "Pesan ke $no_tlpn telah terkirim!" . "<br>";
                } elseif ($send->message == "invalid_number") {
                    $update_status = $this->db->query("UPDATE pesan_jadwal SET status = 'invalid_number' WHERE id_pesan_jadwal = '$value->id_pesan_jadwal'");
                    echo "Pesan ke $no_tlpn Invalid Number!" . "<br>";
                } else {
                    $update_status = $this->db->query("UPDATE pesan_jadwal SET status = 'gagal' WHERE id_pesan_jadwal = '$value->id_pesan_jadwal'");
                    echo "Pesan ke $no_tlpn gagal terkirim!" . "<br>";
                }
            }
        }
    }

    public function removeSessionWhatsapp()
    {
        $json         = file_get_contents(base_url("wa_sessions/whatsapp-sessions.json"));
        $json         = json_decode($json);
        $arraySession = [];
        foreach ($json as $key => $value) {
            if ($value->ready == false) {
                $this->whatsapp->remove_sessions($value->id);
                array_push($arraySession, array(
                    'id'           => $value->id,
                    'fk_id_users'  => $value->fk_id_users,
                    'description'  => $value->description,
                    'created_date' => $value->created_date,
                ));
            }
        }

        $response = [
            'code' => 200,
            'message' => "Berhasil Remove Session",
            'data' => $arraySession
        ];

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function getKelurahanBynameForDPT()
    {
        // $id_province    = 15; // jawa timur
        $kota           = $this->input->post('kota');
        $kecamatan      = $this->input->post('kecamatan');
        $kelurahan_name = $this->input->post('kelurahan_name');

        /* query like %% */
        $getIDCity        = $this->db->query("SELECT * FROM city WHERE name LIKE '%" . $kota . "%'")->result();
        $id_province      = $getIDCity[0]->province_id;
        $city_id          = $getIDCity[0]->id;
        $city_name        = $getIDCity[0]->name;
        $getIDKecamatan   = $this->db->query("SELECT * FROM district WHERE province_id = $id_province AND city_id = $city_id AND name LIKE '%" . $kecamatan . "%' ")->result();
        $district_id      = $getIDKecamatan[0]->id;
        $district_name    = $getIDKecamatan[0]->name;
        $getIDSubdistrict = $this->db->query("SELECT * FROM subdistrict WHERE city_id = $city_id AND district_id = $district_id AND LOWER(REPLACE(name, ' ', '')) LIKE '%" . strtolower(str_replace(' ', '', $kelurahan_name)) . "%' ")->result();
        // $test_query = "SELECT * FROM subdistrict WHERE city_id = $city_id AND district_id = $district_id AND LOWER(REPLACE(name, ' ', '')) LIKE '%" . strtolower($kelurahan_name) . "%' ";
        $subdistrict_id   = $getIDSubdistrict[0]->id;
        $subdistrict_name = $getIDSubdistrict[0]->name;

        if ($district_name) {
            $response = [
                'code'        => 200,
                'status'      => 'success',
                'data'        => [
                    'city_id'          => $city_id,
                    'city_name'        => $city_name,
                    'district_id'      => $district_id,
                    'district_name'    => $district_name,
                    'subdistrict_id'   => $subdistrict_id,
                    'subdistrict_name' => $subdistrict_name
                ],
                'meta'    => [
                    'header_status_code' => 200
                ]
            ];
            toJson($response, $response['meta']['header_status_code']);
        } else {
            $response = [
                'code'        => 400,
                'status'      => 'failed',
                'message'     => 'Data Not Found',
                'data'        => [],
                'meta'    => [
                    'header_status_code' => 400
                ]
            ];

            toJson($response, $response['meta']['header_status_code']);
        }
    }

    public function rekapitulasiDPT(){
        $groupKecamatan = $this->db->group_by('kecamatan')->get('calon_pemilih')->result();

        foreach ($groupKecamatan as $key => $value) {
            
        }
        
        
    }

}
