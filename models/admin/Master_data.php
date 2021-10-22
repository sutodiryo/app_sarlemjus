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

    function get_product_brand()
    {
        return $this->db->query("SELECT * FROM product_brand")->result();
    }

    function get_product_category()
    {
        return $this->db->query("SELECT * FROM product_category")->result();
    }

    function get_product_unit()
    {
        return $this->db->query("SELECT * FROM product_unit")->result();
    }

    function get_bonus_list()
    {
        return  $this->db->query("SELECT * FROM bonus")->result();
    }


    function get_course_category_list()
    {
        return $this->db->query("SELECT id,name,cover,status,
                                        (SELECT COUNT(*) FROM course_acces WHERE id_course_category=course_category.id) AS tot_access
                                        FROM course_category")->result();
    }

    function get_notice_list()
    {
        return  $this->db->query("SELECT    id,title,content,date_start,date_end,status,
                                            (SELECT COUNT(*) FROM notice_target WHERE id_notice=notice.id) AS tot_target
                                    FROM notice")->result();
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

    function get_member_level()
    {
        $q = $this->db->query("SELECT * FROM member_level ORDER BY id DESC")->result();
        return $q;
    }
}
