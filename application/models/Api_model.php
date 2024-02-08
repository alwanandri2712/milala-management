<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all($table, $offset = null, $limit = null, $order_by, $sortorder, $param = array(), $total = false, $cache_time = 0)
    {

        if (@$cache_time != 0) {
            $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
            $key = $table . "#" . $offset . "#" . $limit . "#" . $order_by . "#" . $sortorder . '#' . serialize($param);
            $get_result = $this->cache->get($key);
            if (!empty($get_result))
                return $get_result;
        }
        $db = $this->db;

        if (isset($param['where']['search_column'])) {
            $db->where($param['where']['search_column'][0]);
            unset($param['where']['search_column']);
        }

        $select = !empty($param['select']) ? $param['select'] : '*';
        $where_clause = !empty($param['where']) ? $param['where'] : '';
        $or_where_clause = !empty($param['or_where']) ? $param['or_where'] : '';
        $having_clause = !empty($param['having']) ? $param['having'] : '';
        $like_clause = !empty($param['like']) ? $param['like'] : '';
        $group_clause = !empty($param['group']) ? $param['group'] : '';
        $db->select($select)
            ->from($table);
        (!empty($where_clause)) ? $db->where($where_clause) : '';
        (!empty($or_where_clause)) ? $db->or_where($or_where_clause) : '';
        (!empty($having_clause)) ? $db->having($having_clause) : '';
        (!empty($like_clause)) ? $db->like($like_clause) : '';
        (!empty($group_clause)) ? $db->group_by($group_clause) : '';
        ($limit != null) ? $db->limit($limit, $offset) : '';

        $db->order_by($order_by, $sortorder);
        $q = $db->get();
        $data['results'] = $q->result();
        $data['results_array'] = $q->result_array();

        if ($total == true) {
            $db->select('count(*) as total_results');
            (!empty($where_clause)) ? $db->where($where_clause) : '';
            // (!empty($having_clause))?$db->having($having_clause):'';
            (!empty($like_clause)) ? $db->like($like_clause) : '';
            (!empty($group_clause)) ? $db->group_by($group_clause) : '';
            $q = $db->get($table);
            $row = $q->row();
            $data['total_results'] = @$row->total_results;
        }

        if (@$cache_time != 0) {
            $this->cache->save($key, $data, $cache_time);
        }

        return $data;
    }

    function searching($table, $offset = null, $limit = null, $order_by, $sortorder, $search_value = null, $search_column = array(), $total = false, $cache_time = 0)
    {
        if (@$cache_time != 0) {
            $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
            $key = 'searching_' . $table . "#" . $offset . "#" . $limit . "#" . $order_by . "#" . $sortorder . '#' . $search_value;
            $get_result = $this->cache->get($key);
            if (!empty($get_result))
                return $get_result;
        }

        $this->db->from($table);
        
        $i = 0;
        foreach ($search_column as $item) {
            if ($i === 0) {
                $this->db->group_start();
                $this->db->like('LOWER(' . $item . ')', strtolower($search_value));
            } else {
                $this->db->or_like('LOWER(' . $item . ')', strtolower($search_value));
            }
            if (count($search_column) - 1 == $i)
                $this->db->group_end();
            $i++;
        }
        $this->db->order_by($order_by, $sortorder);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        $data['results'] = $query->result();
        $data['results_array'] = $query->result_array();

        if ($total == true) {
            $this->db->select('count(*) as total_results');
            $this->db->from($table);
            $i = 0;
            foreach ($search_column as $item) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like('LOWER(' . $item . ')', strtolower($search_value));
                } else {
                    $this->db->or_like('LOWER(' . $item . ')', strtolower($search_value));
                }
                if (count($search_column) - 1 == $i)
                    $this->db->group_end();
                $i++;
            }
            $this->db->order_by($order_by, $sortorder);
            $query2 = $this->db->get();
            $row = $query2->row();
            $data['total_results'] = $row->total_results;
        }

        if (@$cache_time != 0) {
            $this->cache->save($key, $data, $cache_time);
        }

        return $data;
    }

    public function get_where($table, $param)
    {
        $this->db->where($param['where']);
        $query = $this->db->get($table);
        return $query->result();
    }

    function add($table, $data)
    {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        if (!empty($id)) {
            return $id;
        } else {
            return false;
        }
    }

    function edit($table, $id, $data_id, $data)
    {
        $this->db->where($id, $data_id)->update($table, $data);
        return $data_id;
    }

    function edit_where($table, $param, $data)
    {
        $this->db->where($param['where']);
        $this->db->update($table, $data);
        return true;
    }

    function delete($table, $id, $data)
    {
        $this->db->where($id, $data)->delete($table);
        return true;
    }

    function delete_where($table, $param)
    {
        $where_clause = !empty($param['where']) ? $param['where'] : '';
        $or_where_clause = !empty($param['or_where']) ? $param['or_where'] : '';

        (!empty($where_clause)) ? $this->db->where($where_clause) : '';
        (!empty($or_where_clause)) ? $this->db->or_where($or_where_clause) : '';
        $this->db->delete($table);
        return true;
    }

}
