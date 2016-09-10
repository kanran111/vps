<?php 
    class Server1_model extends CI_Model{
        public $_table = 'layve';
        public function __construct(){
            parent::__construct();
        }
        public function them($sdt){
            $check = $this->checktrung($sdt);
            if($check==0) return 0;
            $kq = $this->db->query("insert into layve (sdt) values ($sdt) ");
            return 1;
        }
        public function checktrung($sdt){
            $kq = $this->db->query("select * from layve where sdt like $sdt");
            if($kq->num_rows()>=1) return 0;
            return 1;
        }
        public function travejson(){
            $kq = $this->db->select('*')->get($this->_table); //print_r($kq);
            $row = $kq->result_array();
            $kq->free_result();
            $return = array();//tao ra day return moi
            if(!empty($row)){
                foreach($row as $kq){
                    $this->xoakq($kq['idlayve']);
                    $return[] = $kq['sdt'];
                }//foreach $row
                return $return;
            }else{
                return 0;
            }
        }//travejson
        public function xoakq($idlayve){
            $kq = $this->db->query("delete from layve where idlayve=$idlayve");
        }//xoakq
    }
?>