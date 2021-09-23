<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_product_list($status)
    {
        $q = "SELECT    p.id,brand,p.name,slug,description,category,value,free_delivery,weight,length,width,height,p.status,
                        pc.name AS category_name,
                        pb.name AS brand_name,
                        (SELECT image FROM product_image WHERE id_product=p.id LIMIT 1) AS image
                FROM product p
                LEFT JOIN product_category pc ON p.category=pc.id
                LEFT JOIN product_brand pb ON p.brand=pb.id";

        if ($status == "all") {
            $product = "$q";
        } else {
            $product = "$q WHERE p.status='$status'";
        }

        return $this->db->query($product)->result();
    }

    function get_product_by_id($id_product)
    {
        $q = $this->db->query("SELECT * FROM product WHERE id='$id_product'")->row();
        return $q;
    }

    function get_product_stock($id_product)
    {
        $q = $this->db->query("SELECT * FROM product WHERE id='$id_product'")->result();
        return $q;
    }

    function get_course_category_list()
    {
        $q = $this->db->query("SELECT * FROM course_category")->result();
        return $q;
    }

    function get_member_level()
    {
        $q = $this->db->query("SELECT * FROM member_level")->result();
        return $q;
    }

    function get_course_category_by_id($id_category)
    {
        $q = $this->db->query("SELECT id,name FROM course_category WHERE id='$id_category'")->row();
        return $q;
    }

    function get_course_list($id_category)
    {
        $q = $this->db->query("SELECT * FROM course WHERE category='$id_category'")->result();
        return $q;
    }
}
