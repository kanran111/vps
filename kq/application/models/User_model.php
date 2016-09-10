<?php 

    class User_model extends CI_Model{

        protected $_table = 'users';

        public function __construct(){

            parent::__construct();

        }

        public function kiemtradangnhaptrendb($email){

            $cookie = $this->input->cookie('auth',true);

            $timkiem = $this->db->where('userAgent',$email)->where('idSession',$cookie)->get('sessions');

            if($timkiem->num_rows()==0){

                return false;//trả falase nếu ko tim thay user nao

            }

            return true; // tra ve true neu tim thay

        }

        public function dangnhap($email,$pass){

            $kq = $this->db->where('Email',$email)->where('Password',$pass)->where('KichHoat',1)->get($this->_table);

            if($kq->num_rows()==1){

                //$timenow = gmdate(time() + 3600*(7+date("I")));

                $timkiem = $this->db->where('userAgent',$email)->where( "UNIX_TIMESTAMP() - lastVisit <= 900" )->get('sessions');

                echo $this->db->last_query();

                //$timkiem = $this->db->query("select * from sessions where Email like '$email' and ( $timenow - lastVisit <= 15*60 ) ");

                if($timkiem->num_rows()==0){

                    $row = $kq->row();

                    $iduser = $row->idUser;

                    $tennv = $row->tenNV.' '.$row->HovaTenDem;

                    $idgroup = $row->idGroup;

                    $email = $row->Email;

                    $data = array('iduser' => $iduser,'tennv' => $tennv , 'idgroup' => $idgroup, 'email' => $email);

                    $this->session->set_userdata($data);

                    $ttuser=$this->session->all_userdata();$sessionid = session_id();

                    if(!empty($_SERVER['HTTP_CLIENT_IP'])){

                    //check ip from share internet

                    $ip = $_SERVER['HTTP_CLIENT_IP'];

                    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

                        //to check ip is pass from proxy

                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

                    }else{

                        $ip = $_SERVER['REMOTE_ADDR'];

                    }

                    $kiemtratontai = $this->db->where('userAgent',$email)->get('sessions');

                    if($kiemtratontai->num_rows()==1){

                        $data_insert = array('idSession'=>$sessionid,'ipAddress'=>$ip,

                        'lastVisit'=>$ttuser['__ci_last_regenerate'],'session_start'=>1 , 'userAgent' => $email);

                        $this->db->where('userAgent', $email);

                        $this->db->update('sessions', $data_insert);

                    }elseif($kiemtratontai->num_rows()==0){

                        $data_insert = array('idSession'=>$sessionid,'ipAddress'=>$ip,

                        'lastVisit'=>$ttuser['__ci_last_regenerate'],'session_start'=>1 , 'userAgent' => $email);

                        $this->db->insert('sessions', $data_insert);

                    }

                    $data_cookie = array(

                        'name' => 'auth',

                        'value' => $sessionid,

                        'expire' => 3600*24,

                        'domain' => '.kq.mienphimuahang.net',

                        'path' => '/',);

                    $this->input->set_cookie($data_cookie);

                    return true;

                }

                $this->session->set_flashdata('error','user này đang sử dụng');

                return false;

            }else{

                $this->session->set_flashdata('error','tài khoản mật khẩu chưa đúng');

                return false;

            }

        }

    }

?>