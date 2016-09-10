<?php
    class Ketqua_model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public function themketqua($sdt,$sms,$inviewid,$get){
            //print_r($get); die;
            $check = $this->checktrung($sdt);
            if($check==1) {
                $kq = $this->db->query("insert into ketqua (sdt,inviewid,get,sms) values ('$sdt','$inviewid','$get','$sms') ");
            }else{
                $kq = $this->db->query("update ketqua set sdt='$sdt',inviewid='$inviewid',get='$get',sms='$sms' where sdt like $sdt");
            }
            if(empty($kq)) return 0;
            return 1;
        }
        public function checktrung($sdt){
            $kq = $this->db->query("select * from ketqua where sdt like $sdt");
            if($kq->num_rows()>=1) return 0;
            return 1;
        }
        public function hiends($idsdt){
            $kq = $this->db->select('*')->where("sdt = $idsdt")->get('ketqua');
            $row = $kq->result_array();
            $kq->free_result();
            $return = array();//tao ra day return moi
            if(!empty($row)){
                foreach($row as $kq){
                    $this->xoakq($kq['idKQ']);
                }//foreach $row
                return $row;
            }else{
                return 0;
            }
        }
        public function xoakq($idlayve){
            $kq = $this->db->query("delete from ketqua where idKQ=$idlayve");
        }//xoakq
    }
?>