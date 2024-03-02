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

    public function remainderLiburNasional()
    {
        $current_bulan = date('m');
        $current_tahun = date('Y');
        $data          = file_get_contents("https://api-harilibur.vercel.app/api?month=$current_bulan&year=$current_tahun");
        $events        = json_decode($data, true);

        foreach ($events as $event) {

            if ($event['is_national_holiday'] == true) {
                $tanggal_acara     = strtotime($event['holiday_date']);
                $tanggal_pengingat = strtotime('-3 days', $tanggal_acara);
                $tanggal_hari_ini  = strtotime(date('Y-m-d'));
                echo $tanggal_acara."<br>";
    
                if ($tanggal_pengingat <= $tanggal_hari_ini) {

                    echo "Ingatlah untuk persiapkan acara {$event['event']}, karena kita sudah H-3 menuju tanggal {$event['tanggal']}.\n";
                }
            } else {
                echo "BELUM ADA LIBUR NASIONAL"."<br>";
            }

        }
    }
}
