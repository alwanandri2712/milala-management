<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    private $table = 'contact_messages';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Simpan pesan kontak baru
     * 
     * @param array $data Data pesan kontak
     * @return int|bool ID pesan yang disimpan atau FALSE jika gagal
     */
    public function save_message($data)
    {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Ambil semua pesan kontak
     * 
     * @param int $limit Batas jumlah data
     * @param int $offset Offset data
     * @param string $order_by Kolom untuk pengurutan
     * @param string $sort_order Arah pengurutan (asc/desc)
     * @return array Data pesan kontak
     */
    public function get_all_messages($limit = null, $offset = null, $order_by = 'created_at', $sort_order = 'desc')
    {
        $this->db->order_by($order_by, $sort_order);
        
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * Ambil pesan kontak berdasarkan ID
     * 
     * @param int $id ID pesan kontak
     * @return object|null Data pesan kontak
     */
    public function get_message_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * Perbarui status pesan kontak
     * 
     * @param int $id ID pesan kontak
     * @param string $status Status baru (unread/read)
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, ['status' => $status]);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Hapus pesan kontak
     * 
     * @param int $id ID pesan kontak
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function delete_message($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Hitung jumlah pesan kontak
     * 
     * @param string $status Status pesan (unread/read/all)
     * @return int Jumlah pesan kontak
     */
    public function count_messages($status = 'all')
    {
        if ($status !== 'all') {
            $this->db->where('status', $status);
        }
        
        return $this->db->count_all_results($this->table);
    }
}
