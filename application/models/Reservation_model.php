<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation_model extends CI_Model
{
    private $table = 'reservations';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Simpan reservasi baru
     * 
     * @param array $data Data reservasi
     * @return int|bool ID reservasi yang disimpan atau FALSE jika gagal
     */
    public function save_reservation($data)
    {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Ambil semua reservasi
     * 
     * @param int $limit Batas jumlah data
     * @param int $offset Offset data
     * @param string $order_by Kolom untuk pengurutan
     * @param string $sort_order Arah pengurutan (asc/desc)
     * @param array $where Kondisi where
     * @return array Data reservasi
     */
    public function get_all_reservations($limit = null, $offset = null, $order_by = 'created_at', $sort_order = 'desc', $where = null)
    {
        if ($where !== null) {
            $this->db->where($where);
        }
        
        $this->db->order_by($order_by, $sort_order);
        
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * Ambil reservasi berdasarkan ID
     * 
     * @param int $id ID reservasi
     * @return object|null Data reservasi
     */
    public function get_reservation_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * Perbarui status reservasi
     * 
     * @param int $id ID reservasi
     * @param string $status Status baru (pending/confirmed/completed/cancelled)
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => $status]);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Hapus reservasi
     * 
     * @param int $id ID reservasi
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function delete_reservation($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Hitung jumlah reservasi
     * 
     * @param string $status Status reservasi (pending/confirmed/completed/cancelled/all)
     * @return int Jumlah reservasi
     */
    public function count_reservations($status = 'all')
    {
        if ($status !== 'all') {
            $this->db->where('status', $status);
        }
        
        return $this->db->count_all_results($this->table);
    }
}
