<?php

class Menu_model extends CI_Model{

    var $vtable        = 'menu';
    var $table         = 'menu';
    var $table_rel1    = 'user_access';
    var $column_order  = array('menu_name','menu_parent_name','menu_url_link','menu_order');
    var $column_search = array('menu_name','menu_parent_name');
    var $order         = array('menu_parent_id' => 'asc');

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query(){
        $this->db->from($this->vtable);
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
        $this->db->where('menu_id !=',0);
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
        $this->db->from($this->vtable);
        return $this->db->count_all_results();
    }

    function get_all($offset=null,$limit=null, $order_by = 'menu_id', $sortorder = 'asc', $param=array(),$total=false){
        $db = $this->db;
        $select = !empty($param['select'])?$param['select']:'*';
        $where_clause = !empty($param['where'])?$param['where']:'';
        $like_clause = !empty($param['like'])?$param['like']:'';
        $db->select($select)
            ->from($this->vtable)
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
            $q = $db->get($this->vtable);
            $row = $q->row();
            $data['total_results'] = $row->total_results;
        }
        return $data;
    }

    function add(){
        $data = array(
            'menu_parent_id'=> $this->input->post('menu_parent_id'),
            'menu_name'     => $this->input->post('menu_name'),
            'menu_icon'     => $this->input->post('menu_icon'),
            'menu_order'    => $this->input->post('menu_order'),
            'menu_url_link' => $this->input->post('menu_url_link'),
        );
        $this->db->insert($this->table,$data);
        return true;
    }

    function edit($id){
        $data = array(
            'menu_parent_id'=> $this->input->post('menu_parent_id'),
            'menu_name'     => $this->input->post('menu_name'),
            'menu_icon'     => $this->input->post('menu_icon'),
            'menu_order'    => $this->input->post('menu_order'),
            'menu_url_link' => $this->input->post('menu_url_link'),
        );
        $this->db->where('menu_id',$id)->update($this->table,$data);
        return true;
    }

    function delete($id){
        $this->db->where('menu_id',$id)->delete($this->table);
        $this->db->where('menu_id',$id)->delete($this->table_rel1);
        return TRUE;
    }

}