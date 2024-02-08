<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon_pemilih_model extends CI_Model
{

    var $table         = 'calon_pemilih';
    var $vtable        = 'calon_pemilih';
    var $column_order  = array('koordinator_name', 'fullname', 'nik', 'jenis_kelamin', 'usia', 'kecamatan', 'kelurahan_desa', 'dusun', 'rt', 'rw', 'no_whatsapp', 'tps', 'created_by', 'created_date');
    var $column_search = array('koordinator_name', 'fullname', 'nik', 'jenis_kelamin', 'usia', 'kecamatan', 'kelurahan_desa', 'dusun', 'rt', 'rw', 'no_whatsapp', 'tps', 'created_by', 'created_date');
    var $order         = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->db_bobat_2 = $this->load->database('db_backup_1',true);
    }

    private function _get_datatables_query($koordinator_name = null, $kota = null, $kecamatan = null, $kelurahan = null)
    {
        $this->db->from($this->vtable);

        if ($this->session->userdata('id_role') != 1) {
            $this->db->where('user_id', $this->session->userdata('id_user'));
        }

        if ($koordinator_name != null) {
            $this->db->where('koordinator_name' , $koordinator_name);
        }

        if ($kota != null) {
            $this->db->where('city_id',$kota);
        }

        if ($kecamatan != null) {
            $this->db->where('district_id',$kecamatan);
        }

        if ($kelurahan != null) {
            $this->db->where('subdistrict_id',$kelurahan);
        }

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

    function get_datatables($koordinator_name = null, $kota = null, $kecamatan = null, $kelurahan = null)
    {
        $this->_get_datatables_query($koordinator_name, $kota, $kecamatan, $kelurahan);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        // print_r($this->db->last_query()); die;
        return $query->result();
    }

    function count_filtered($koordinator_name = null, $kota = null, $kecamatan = null, $kelurahan = null)
    {
        $this->_get_datatables_query($koordinator_name, $kota, $kecamatan, $kelurahan);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($koordinator_name = null, $kota = null, $kecamatan = null, $kelurahan = null)
    {
        $this->db->from($this->vtable);

        if ($koordinator_name != null) {
            $this->db->where('koordinator_name' , $koordinator_name);
        }

        if ($kota != null) {
            $this->db->where('city_id',$kota);
        }

        if ($kecamatan != null) {
            $this->db->where('district_id',$kecamatan);
        }

        if ($kelurahan != null) {
            $this->db->where('subdistrict_id',$kelurahan);
        }

        return $this->db->count_all_results();
    }

    function get_all($offset = null, $limit = null, $order_by = 'id', $sortorder = 'desc', $param = array(), $total = false)
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
        // $this->db_bobat_2->insert($this->table, $data);
        $data = $this->db->insert($this->table, $data);
        return $data;
    }

    public function update($param = array(), $data)
    {
        $this->db->where($param);
        $data = $this->db->update($this->table, $data);
        return $data;
    }

    public function delete($id)
    {
        $data = $this->db->delete($this->table, array('id' => $id));
        // $this->db_bobat_2->delete($this->table, array('id' => $id));
        return $data;
    }

    public function edit($id, $data = array())
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        // return $this->db->last_query();
        return $this->db->affected_rows();
    }

    public function get_koordinator_name(){
        $this->db->select('koordinator_name');
        $this->db->from($this->table);
        $this->db->group_by('koordinator_name');
        $query = $this->db->get();
        return $query->result();
    }
}


/* End of file Role_model.php */
// function
/* Location: ./application/models/Role_model.php */
