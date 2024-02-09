<?php

class Home_model extends CI_Model
{
    // var $vtable        = 'role';
    var $column_order  = array('kecamatan', 'created_by', 'is_delete');
    var $column_search = array('kecamatan', 'created_by', 'is_delete');
    var $order         = array('total' => 'ASC');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function count_users()
    {
        return $this->db->get('user')->num_rows();
    }

    public function count_task()
    {
        return $this->db->get('list_task')->num_rows();
    }

    public function count_task_done(){
        $this->db->where('status', '2');
        return $this->db->get('list_task')->num_rows();
    }

    public function count_task_onproggress(){
        $this->db->where('status', '1');
        return $this->db->get('list_task')->num_rows();
    }

    public function count_task_pending(){
        $this->db->where('status', '0');
        return $this->db->get('list_task')->num_rows();
    }

    public function count_gallery_foto()
    {
        if ($this->session->userdata('id_role') == 1) {
            return $this->db->get('gallery')->num_rows();
        } else {
            return $this->db->get_where('gallery', array('user_id' => $this->session->userdata('id_users')))->num_rows();
        }
    }

    public function performance_koordinator()
    {
        $data = $this->db->query("SELECT koordinator_name, COUNT(*) as ttl_suara FROM calon_pemilih GROUP BY koordinator_name ORDER BY ttl_suara DESC")->result();
        return $data;
    }

    private function _get_datatables_query()
    {
        // $this->db->from($this->vtable);
        // $this->db->query('SELECT COUNT(*) AS total,kecamatan FROM calon_pemilih GROUP BY kecamatan');
        $this->db->select('kecamatan, COUNT(*) AS total');
        $this->db->from('calon_pemilih');
        $this->db->group_by('kecamatan');
        $this->db->order_by('total', 'DESC');
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
        // print_r($this->db->last_query()); die;
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
        $this->db->from('calon_pemilih');
        return $this->db->count_all_results();
    }
}
