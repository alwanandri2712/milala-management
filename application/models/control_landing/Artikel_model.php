<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    var $table         = 'artikel';
    var $vtable        = 'artikel';
    var $column_order  = array('artikel_image', 'artikel_title', 'artikel_kategori', 'created_by', 'created_date');
    var $column_search = array('artikel_image', 'artikel_title', 'artikel_kategori', 'created_by', 'created_date');
    var $order         = array('artikel_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->vtable);

        $i = 0;
        foreach ($this->column_search as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
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
        try {
            $this->_get_datatables_query();
            if (@$_POST['length'] != -1)
                $this->db->limit(@$_POST['length'], @$_POST['start']);
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $e) {
            log_message('error', 'Error in get_datatables: ' . $e->getMessage());
            return array();
        }
    }

    function count_filtered()
    {
        try {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            log_message('error', 'Error in count_filtered: ' . $e->getMessage());
            return 0;
        }
    }

    public function count_all()
    {
        try {
            $this->db->from($this->vtable);
            return $this->db->count_all_results();
        } catch (Exception $e) {
            log_message('error', 'Error in count_all: ' . $e->getMessage());
            return 0;
        }
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
        // Konversi nama field sesuai dengan struktur database
        $insert_data = array(
            'user_id' => isset($data['user_id']) ? $data['user_id'] : null,
            'artikel_title' => isset($data['title']) ? $data['title'] : '',
            'artikel_slug' => isset($data['title_slug']) ? $data['title_slug'] : '',
            'artikel_kategori' => isset($data['category']) ? $data['category'] : '',
            'artikel_content' => isset($data['content']) ? $data['content'] : '',
            'artikel_image' => isset($data['image']) ? $data['image'] : '',
            'artikel_status' => isset($data['status']) ? $data['status'] : 1, // Default: Published (1)
            'created_by' => isset($data['created_by']) ? $data['created_by'] : '',
            'created_date' => isset($data['created_date']) ? $data['created_date'] : date('Y-m-d H:i:s')
        );

        $this->db->insert($this->table, $insert_data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $data = $this->db->delete($this->table, array('artikel_id' => $id));
        return $data;
    }

    public function edit($id, $data = array())
    {
        // Konversi nama field sesuai dengan struktur database
        $update_data = array();

        if (isset($data['title'])) $update_data['artikel_title'] = $data['title'];
        if (isset($data['title_slug'])) $update_data['artikel_slug'] = $data['title_slug'];
        if (isset($data['category'])) $update_data['artikel_kategori'] = $data['category'];
        if (isset($data['content'])) $update_data['artikel_content'] = $data['content'];
        if (isset($data['image'])) $update_data['artikel_image'] = $data['image'];
        if (isset($data['status'])) $update_data['artikel_status'] = $data['status'];
        if (isset($data['updated_by'])) $update_data['updated_by'] = $data['updated_by'];

        $update_data['updated_date'] = date('Y-m-d H:i:s');

        $this->db->where('artikel_id', $id);
        $this->db->update($this->table, $update_data);
        // return $this->db->last_query();
        return $this->db->affected_rows();
    }

    // Get published articles for frontend display
    public function get_published_articles($limit = 10, $offset = 0)
    {
        $this->db->where('artikel_status', 1); // Only get published articles
        $this->db->order_by('created_date', 'desc');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    // Get article by slug for detail page
    public function get_article_by_slug($slug)
    {
        $this->db->where('artikel_slug', $slug);
        $this->db->where('artikel_status', 1); // Only get published articles
        return $this->db->get($this->table)->row();
    }
}
