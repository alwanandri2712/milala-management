<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model{

    var $table 	= 'user_group';
    var $table_rel1 = 'user_access';
    var $table_rel2 = 'menu';
    var $column_order = array('group_name');
    var $column_search = array('group_name');
    var $order = array('group_name' => 'asc');

    function __construct(){
		parent::__construct();
        $this->load->database();
	}

    private function _get_datatables_query(){
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like('LOWER(' .$item. ')', strtolower($_POST['search']['value']));
                }else {
                    $this->db->or_like('LOWER(' .$item. ')', strtolower($_POST['search']['value']));
                }
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

	function get_all($offset=null,$limit=null, $order_by = 'group_id', $sortorder = 'desc', $param=array(),$total=false){
        $db = $this->db;
        $select = !empty($param['select'])?$param['select']:'*';
        $where_clause = !empty($param['where'])?$param['where']:'';
        $like_clause = !empty($param['like'])?$param['like']:'';
        $db->select($select)
            ->from($this->table)
        ;
        (!empty($where_clause))?$db->where($where_clause):'';
        (!empty($like_clause))?$db->or_like($like_clause):'';
        ($limit != null) ? $db->limit($limit,$offset) : '';

        $db->order_by($order_by,$sortorder);
        $q = $db->get();
        $data['results'] = $q->result();
        $data['results_array'] = $q->result_array();

        if($total == true){
            $db->select('count(*) as total_results')
            ;
            (!empty($where_clause))?$db->where($where_clause):'';
            (!empty($like_clause))?$db->or_like($like_clause):'';
            $q = $db->get($this->table);
            $row = $q->row();
            $data['total_results'] = $row->total_results;
        }
        return $data;
    }

    function add(){
        $data = array(
            'group_name' => $this->input->post('group_name'),
        );
        $this->db->insert($this->table,$data);
        $id = $this->db->insert_id();

        $user_access = $this->input->post('user_access');
        if(!empty($user_access)){
            foreach($user_access as $i => $ua){
                $data_accees = array(
                    'group_id' => $id,
                    'menu_id' => $i
                );
                $this->db->insert($this->table_rel1,$data_accees);
            }
        }
        return true;
    }

    function edit($id){
        $data = array(
            'group_name' => $this->input->post('group_name'),
        );
        $this->db->where('group_id',$id)->update($this->table,$data);

        $user_access = $this->input->post('user_access');
        if(!empty($user_access)){

            $this->db->where('group_id',$id)->delete($this->table_rel1);

            foreach($user_access as $i => $ua){
                $data_accees = array(
                    'group_id' => $id,
                    'menu_id' => $i
                );
                $this->db->insert($this->table_rel1,$data_accees);
            }
        }

        return true;
    }

    function delete($id){
        $this->db->where('group_id',$id)->delete($this->table);
    }

    function check_user_access($group_id,$menu_id){
        $query = $this->db->select('*')
            ->from('user_access')
            ->where('group_id',$group_id)
            ->where('menu_id',$menu_id)
            ->get()
        ;
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}