<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_stat($id)
    {
        // $bulan           = $d["month"];
        // $tahun           = $d["year"];
        // $tgl             = "";
        // if (empty($d)) {
        $where  = "WHERE transaksi.id_member='$id' AND MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";
        $where1 = "WHERE id_member IN (SELECT id_member FROM member WHERE id_upline='$id') AND MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";
        $where2 = "WHERE id_member IN (SELECT id_member FROM member WHERE id_upline='$id') OR id_member_to IN (SELECT id_member FROM member WHERE id_upline='$id') AND MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";
        // } else {
        // $where          = "$cek_idm MONTH(transaksi.tgl_pesan) = $bulan AND YEAR(transaksi.tgl_pesan) = $tahun";
        // $where2         = "WHERE transaksi.id_member IN (SELECT id_member FROM member WHERE id_upline='$id') AND MONTH(transaksi.tgl_pesan) = $bulan AND YEAR(transaksi.tgl_pesan) = $tahun";
        // $data['date']   = date($this->input->post('date'));
        // }

        $query = $this->db->query("SELECT   level,nama,
                                            (SELECT COUNT(*) FROM member WHERE id_upline='$id') AS team,
                                            (SELECT SUM( quantity*(SELECT harga FROM produk WHERE id_produk=transaksi_produk.id_produk) ) FROM transaksi_produk WHERE status IS NULL AND id_transaksi IN (SELECT id_transaksi FROM transaksi $where AND status IN (3,4) AND tipe=0)) AS pa,
                                            (SELECT SUM(commission) FROM transaksi $where1 AND transaksi.status = 4) AS pb,
                                            (SELECT SUM(commission) FROM transaksi $where1 AND transaksi.status = 3) AS pc,
                                            (SELECT SUM(pv) FROM transaksi $where2 AND status IN (3)) AS pd,
                                            (SELECT nama_bonus FROM bonus WHERE total_pv > pd ORDER BY total_pv ASC LIMIT 1) AS bonus,
                                            (SELECT total_pv FROM bonus WHERE total_pv > pd ORDER BY total_pv ASC LIMIT 1) AS total_pv,
                                                        
                                            (SELECT SUM(total) FROM transaksi $where AND status IN (3,4) AND tipe=0) AS beli,
                                            (SELECT smp FROM member_level WHERE member_level.id_member_level=member.level) AS minim
                                    FROM member WHERE id_member='$id'")->row();

        return $query;
    }

    public function get_ldb()
    {
        $where  = "WHERE  MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()-1) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";
        $where1 = "WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m.id_member) AND MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()-1) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";
        $where2 = "WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m.id_member) OR id_member_to IN (SELECT id_member FROM member WHERE id_upline=m.id_member) AND MONTH(transaksi.tgl_pesan) = MONTH(CURRENT_DATE()-1) AND YEAR(transaksi.tgl_pesan) = YEAR(CURRENT_DATE())";

        $query = $this->db->query("SELECT   m.nama, m.level,
                                            (SELECT SUM(commission) FROM transaksi $where1 AND transaksi.status = 4) AS pb,
                                            (SELECT SUM(commission) FROM transaksi $where1 AND transaksi.status = 3) AS pc,
                                            (SELECT SUM(pv) FROM transaksi $where2 AND status IN (3)) AS pd,
                                            IF(m.level=4,((SELECT SUM(total) FROM transaksi $where AND transaksi.id_member=m.id_member AND status IN (3,4) AND tipe=0)*(0.05)),'-') AS pe
                                    FROM member m
                                    WHERE (SELECT SUM(total) FROM transaksi WHERE id_member=m.id_member AND status IN (3,4) AND MONTH(tgl_pesan) >= MONTH(CURRENT_DATE()-1) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE()-1))>=(SELECT smp FROM member_level WHERE member_level.id_member_level=m.level)
                                    ORDER BY pb DESC, pc DESC, pd DESC, pe DESC, nama ASC LIMIT 10")->result();

        return $query;
    }

    function get_team_dashboard($id)
    {
        $query = $this->db->query("SELECT   id_member,nama,no_hp,tgl_reg,level,
                                            (SELECT nama_level FROM member_level WHERE id_member_level=member.level) AS nama_level,
                                            -- (SELECT SUM(total) FROM transaksi WHERE transaksi.id_member=member.id_member AND transaksi.status IN (3,4)) AS oms,
                                            -- (SELECT SUM(commission) FROM transaksi WHERE transaksi.id_member=member.id_member) AS com,
                                            -- (SELECT SUM(pv) FROM transaksi WHERE transaksi.id_member=member.id_member) AS pv,
                                            -- (SELECT oms+com+pv) tot,
                                            (SELECT SUM(total) FROM transaksi WHERE id_member=member.id_member AND status IN (3,4) AND MONTH(tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())) AS beli,
                                            (SELECT SUM(total) FROM transaksi WHERE id_member=member.id_member AND status IN (3,4) AND MONTH(tgl_pesan) >= (MONTH(CURRENT_DATE())-3) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())) AS beli2,
                                            (SELECT smp FROM member_level WHERE member_level.id_member_level=member.level) AS minim
                                    FROM member WHERE id_upline='$id' ORDER BY beli DESC, level ASC, nama ASC")->result();
        return $query;
    }

    function get_product($id)
    {
        // $cek_stok   = "SELECT SUM(quantity) FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE id_member='$id') AND (SELECT tipe FROM transaksi WHERE id_transaksi=transaksi_produk.id_transaksi)=";

        $stock_plus_buy         = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE status IN (3,4) AND id_member='$id' AND tipe=0)";
        $stock_plus_buy_member  = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE status IN (3,4) AND id_member_to='$id' AND tipe=1)";

        $stock_min_sell_member  = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE status IN (3,4) AND id_member='$id' AND tipe=1)";
        $stock_broken       = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_member='$id'";
        $stock_min_broken       = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_member='$id' AND status=0";
        $stock_plus_broken       = "SELECT SUM(quantity) AS q FROM transaksi_produk WHERE id_produk=produk.id_produk AND id_member='$id' AND status=1";

        $query = $this->db->query("SELECT   id_produk,slug,nama_produk,harga,nilai,img_1,img_2,satuan,keterangan,waktu_input,status,
                                            ($stock_plus_buy) AS stock_plus_buy,
                                            ($stock_plus_buy_member) AS stock_plus_buy_member,
                                            ($stock_min_sell_member) AS stock_min_sell_member,
                                            ($stock_broken) AS stock_broken,
                                            ($stock_min_broken) AS stock_min_broken,
                                            ($stock_plus_broken) AS stock_plus_broken
                                    FROM produk
                                    WHERE produk.status=1")->result();
        return $query;
    }

    function get_team_stat($id)
    {
        $query = $this->db->query("SELECT   (SELECT COUNT(m2.id_member) FROM member m2 WHERE m2.id_upline='$id') AS team,
                                            (SELECT SUM(total) FROM transaksi WHERE transaksi.id_member IN (SELECT m2.id_member FROM member m2 WHERE m2.id_upline='$id') AND transaksi.status IN (3,4)) AS oms,
                                            (SELECT SUM(commission) FROM transaksi WHERE transaksi.id_member IN (SELECT m2.id_member FROM member m2 WHERE m2.id_upline='$id') AND transaksi.status IN (3,4)) AS com,
                                            (SELECT SUM(pv) FROM transaksi WHERE transaksi.id_member IN (SELECT m2.id_member FROM member m2 WHERE m2.id_upline='$id') AND transaksi.status IN (3,4)) AS pv
                                    FROM member m1")->row();
        return $query;
    }

    function get_team($id)
    {
        $query = $this->db->query("SELECT   id_member,nama,no_hp,tgl_reg,level,
                                            (SELECT nama_level FROM member_level WHERE id_member_level=member.level) AS lv,
                                            (SELECT SUM(total) FROM transaksi WHERE transaksi.id_member=member.id_member AND transaksi.status IN (3,4)) AS oms,
                                            (SELECT SUM(commission) FROM transaksi WHERE transaksi.id_member=member.id_member AND transaksi.status IN (3,4)) AS com,
                                            (SELECT SUM(pv) FROM transaksi WHERE transaksi.id_member=member.id_member AND transaksi.status IN (3,4)) AS pv,
                                            (SELECT oms+com+pv) tot,
                                            
                                            (SELECT SUM(total) FROM transaksi WHERE id_member=member.id_member AND status IN (3,4) AND MONTH(tgl_pesan) >= MONTH(CURRENT_DATE()) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())) AS beli,
                                            (SELECT SUM(total) FROM transaksi WHERE id_member=member.id_member AND status IN (3,4) AND MONTH(tgl_pesan) >= (MONTH(CURRENT_DATE())-3) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())) AS beli2,
                                            (SELECT smp FROM member_level WHERE member_level.id_member_level=member.level) AS minim
                                    FROM member WHERE id_upline='$id' ORDER BY tot DESC, nama ASC, tgl_reg ASC")->result();
        return $query;
    }

    function get_transaction_stat($id, $date)
    {
        $d          = date_parse_from_format("Y-m-d", date($date));
        $bulan      = $d["month"];
        $tahun      = $d["year"];

        if (empty($date)) {
            $where = "WHERE id_member='$id' AND MONTH(tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())";
        } else {
            $where = "WHERE id_member='$id' AND MONTH(tgl_pesan) = $bulan AND YEAR(tgl_pesan) = $tahun";
        }
        $query = $this->db->query("SELECT   (SELECT SUM(total) FROM transaksi $where AND tipe=0) AS beli,
                                            (SELECT SUM(total) FROM transaksi $where AND tipe=1) AS jual
                                    FROM transaksi")->row();
        return $query;
    }

    function get_transaction_list($id, $date)
    {
        $d          = date_parse_from_format("Y-m-d", date($date));
        $bulan      = $d["month"];
        $tahun      = $d["year"];

        if (empty($date)) {
            $where = "WHERE id_member='$id' AND MONTH(tgl_pesan) = MONTH(CURRENT_DATE()) AND YEAR(tgl_pesan) = YEAR(CURRENT_DATE())";
        } else {
            $where = "WHERE id_member='$id' AND MONTH(tgl_pesan) = $bulan AND YEAR(tgl_pesan) = $tahun";
        }

        $query = "  SELECT  id_transaksi,id_member,id_member_to,nama_promo,nilai_promo,ongkir,total,status,resi,id_kurir,tgl_pesan,tipe,bukti_transfer,
                            (SELECT IF((transaksi.tipe=1), (SELECT nama FROM member WHERE id_member=transaksi.id_member_to), 0)) AS member_to,
                            (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                            (SELECT no_hp FROM member WHERE id_member=transaksi.id_member) AS no_hp
                    FROM transaksi $where";
        return $query;
    }

    function get_product_purchase($idm)
    {
        $query =  $this->db->query("SELECT  id_produk,nama_produk,satuan,nilai,img_1,img_2,keterangan,waktu_input,status,berat,
                                            (SELECT harga FROM produk_harga WHERE id_produk=produk.id_produk AND produk_harga.id_member_level=(SELECT level FROM member WHERE member.id_member='$idm')) AS harga,
                                            ((SELECT SUM(stock_update) FROM produk_stok WHERE id_produk=produk.id_produk)) AS stok,
                                            (SELECT SUM(quantity) FROM transaksi_produk WHERE transaksi_produk.id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE status IN (3,4))) AS stok_
                                        FROM produk
                                        WHERE produk.status=1")->result();
        return $query;
    }

    function get_product_purchase_cart($idm,$idp)
    {
        $query =  $this->db->query("SELECT  id_produk,nama_produk,satuan,nilai,img_1,img_2,keterangan,waktu_input,status,berat,
                                            (SELECT harga FROM produk_harga WHERE id_produk=produk.id_produk AND produk_harga.id_member_level=(SELECT level FROM member WHERE member.id_member='$idm')) AS harga,
                                            ((SELECT SUM(stock_update) FROM produk_stok WHERE id_produk=produk.id_produk)) AS stok,
                                            (SELECT SUM(quantity) FROM transaksi_produk WHERE transaksi_produk.id_produk=produk.id_produk AND id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE status IN (3,4))) AS stok_
                                        FROM produk
                                        WHERE produk.id_produk='$idp' AND produk.status=1")->row();
        return $query;
    }

    function get_product_front($limit)
    {
        $query =  $this->db->query("SELECT   id_produk,nama_produk,satuan,nilai,img_1,img_2,keterangan,waktu_input,status,berat
                                        FROM produk
                                        WHERE produk.status=1
                                        $limit")->result();
        return $query;
    }

    function get_bonus()
    {
        $query =  $this->db->query("SELECT * FROM bonus
                                    ORDER BY total_pv ASC")->result();
        return $query;
    }

    function get_profile($id)
    {
        $query =  $this->db->query("SELECT 	m1.id_member,m1.username,m1.nama,m1.no_hp,m1.status,m1.tgl_reg,m1.kota,m1.alamat,m1.id_location,m1.level,m1.email,m1.kode_bank,m1.no_rekening,m1.nama_rekening,m1.pekerjaan,
                                            (SELECT nama FROM member m2 WHERE m2.id_member=m1.id_upline) AS member,
                                            (SELECT COUNT(id_upline) FROM member m2 WHERE m2.id_upline=m1.id_member) AS team,
                                            (SELECT COUNT(id_transaksi) FROM transaksi WHERE transaksi.id_member=m1.id_member) AS transaksi,
                                            (SELECT location_name FROM location WHERE id_location=m1.id_location) AS kota2,
                                            (SELECT id_member FROM member m2 WHERE m2.id_member=m1.id_upline) AS id_member_up
                                    FROM member m1
                                    WHERE id_member='$id'")->row();
        return $query;
    }

    function get_member_shipping($id)
    {
        $query =  $this->db->query("SELECT id_member_shipping,id_member,nama_penerima,no_hp_penerima,id_province,id_district,id_subdistrict,province_name,district_name,subdistrict_name,postal_code,full_address,status
                                    FROM member_shipping
                                    WHERE id_member='$id'
                                    ORDER BY date_created DESC")->result();
        return $query;
    }
    
    function get_member_shipping_default($id)
    {
        $query =  $this->db->query("SELECT id_member_shipping,id_member,nama_penerima,no_hp_penerima,id_province,id_district,id_subdistrict,province_name,district_name,subdistrict_name,postal_code,full_address,status
                                    FROM member_shipping
                                    WHERE id_member='$id' AND status=1")->row();
        return $query;
    }

    function get_member_shipping_by_id($idm,$idsa)
    {
        $query =  $this->db->query("SELECT id_member_shipping,id_member,nama_penerima,no_hp_penerima,id_province,id_district,id_subdistrict,province_name,district_name,subdistrict_name,postal_code,full_address,status
                                    FROM member_shipping
                                    WHERE id_member='$idm'
                                    AND id_member_shipping='$idsa'")->row();
        return $query;
    }
    
}
