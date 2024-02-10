<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_fasilitas_bengkel_model extends CI_Model
{

    var $table         = 'pengajuan_fasilitas';
    var $vtable        = 'pengajuan_fasilitas';
    var $column_order  = array('nama_barang', 'qty', 'cabang','created_by', 'created_date');
    var $column_search = array('nama_barang', 'qty', 'cabang','created_by', 'created_date');
    var $order         = array('id_pengajuan' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        if ($this->session->userdata('id_role') != 1) {
            $this->db->where('id_user', $this->session->userdata('id_user'));
        }

        $this->db->from($this->vtable);
        $i = 0;
        foreach ($this->column_search as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like('LOWER(' . $item . ')', strtolower($_POST['search']['value']));
                } else {
                    $this->db->or_like('LOWER(' . $item . ')', strtolower($_POST['search']['value']));
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->vtable);
        return $this->db->count_all_results();
    }

    function get_all($offset = null, $limit = null, $order_by = 'id_pengajuan', $sortorder = 'desc', $param = array(), $total = false)
    {
        $db = $this->db;
        $select = !empty($param['select']) ? $param['select'] : '*';
        $where_clause = !empty($param['where']) ? $param['where'] : '';
        $like_clause = !empty($param['like']) ? $param['like'] : '';
        $db->select($select)
            ->from($this->vtable);
        (!empty($where_clause)) ? $db->where($where_clause) : '';
        (!empty($like_clause)) ? $db->or_like($like_clause) : '';
        ($limit != null) ? $db->limit($limit, $offset) : '';

        $db->order_by($order_by, $sortorder);
        $q = $db->get();
        $data['results'] = $q->result();
        $data['results_array'] = $q->result_array();

        if ($total == true) {
            $db->select('count(*) as total_results');
            (!empty($where_clause)) ? $db->where($where_clause) : '';
            (!empty($like_clause)) ? $db->or_like($like_clause) : '';
            $q = $db->get($this->vtable);
            $row = $q->row();
            $data['total_results'] = $row->total_results;
        }
        return $data;
    }


    public function add($data)
    {
        $data = $this->db->insert($this->table, $data);
        return $data;
    }

    public function delete($id)
    {
        $data = $this->db->delete($this->table, array('id_pengajuan' => $id));
        return $data;
    }

    public function edit($id)
    {
        $data = array(
            'nama_barang' => $this->security->xss_clean($this->input->post('nama_barang')),
            'qty'         => $this->security->xss_clean($this->input->post('qty')),
            'cabang'      => $this->security->xss_clean($this->input->post('cabang')),
            'status'      => $this->security->xss_clean($this->input->post('status')),
        );
        $this->db->where('id_pengajuan', $id);
        $this->db->update($this->table, $data);
        // return $this->db->last_query();
        return $this->db->affected_rows();
    }

}


/* End of file Role_model.php */
// function
/* Location: ./application/models/Role_model.php */
