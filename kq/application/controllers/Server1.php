<?php 
    class Server1 extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Server1_model');
            $this->load->helper('url');
            $this->load->helper('cookie');
            
        }
        public function dangnhap1(){
            $this->load->model('User_model');
            $this->form_validation->set_rules('email','email','required|trim');
            $this->form_validation->set_rules('pass','password','required|trim');
            if($this->form_validation->run()){
                $email = xss_clean($this->input->post('email'));
                $pass = md5(xss_clean($this->input->post('pass')));
                $kq = $this->User_model->dangnhap($email,$pass);
                if($kq) redirect(base_url('server1'));
                else{
                    redirect(base_url('server1/dangnhap'));
                }
            }
            redirect(base_url('server1/dangnhap'));
        }
        public function thoat(){
            $cookie = $this->input->cookie('auth',true);
            $this->db->query("delete from sessions where idSession = '$cookie' ");
            setcookie("auth", $sessionid, time()-(3600*25), '/','kq.mienphimuahang.net' );
            delete_cookie('auth', '.kq.mienphimuahang.net' , '/'); 
            $this->session->sess_destroy();
            redirect(base_url('server1/dangnhap'));
        }
        public function dangnhap(){
            if($this->checkdn()) redirect(base_url('server1'));
            //layout
            $this->load->view('dangnhap');
        }
        public function checkdn(){
            $this->load->model('User_model');
            $cookie = $this->input->cookie('auth',true);
            if(empty($cookie)) return false;
            $email = $this->session->userdata('email');
            if(!empty($email)){
                $check = $this->User_model->kiemtradangnhaptrendb($email);
                if($check==false) return false;// neu ko thay tra false
            }else{
                return false; // neu ko co bien email tra false
            }
            return true; // tra true neu co dang nhap
        }
        public function index(){
            if(!$this->checkdn()) redirect(base_url('server1/dangnhap'));
            //$baomat = $this->baomat();
            //if(!$baomat) die('liên hệ 0901 887 889 nếu muốn vào đây');
            $data['dataserver']= '';
            //layout
            $this->load->view('server_view',$data);
        }
        public function tradulieu(){
            $data = $this->Server1_model->travejson();
            echo json_encode($data);
        }
        public function checksdt($sdt,&$real){
            settype($sdt,'float');
            //echo substr($sdt,0,2); die;
            if(strlen($sdt)>12) {$this->session->set_flashdata('error','sdt phải là số mobi'); return 0; die;}
            if(empty($sdt)) { $this->session->set_flashdata('error','sdt phải là số và ko đc trống'); return 0; die;}
            if(substr($sdt,0,2)=='84'){
                if(substr($sdt,2,1)=='9'){
                    if(strlen($sdt)!=11) {$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
                    $sdt = substr($sdt,2,9);
                }elseif(substr($sdt,2,1)=='1'){
                    if(strlen($sdt)!=12) {$this->session->set_flashdata('error','kt lai sdt '); return 0; die;}
                    $sdt = substr($sdt,2,10);
                }
                elseif(substr($sdt,2,1)=='8'){
                    if(strlen($sdt)!=11) {$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
                    $sdt = substr($sdt,2,9);   
                }else{$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
            }
            // check sdt
            if(substr($sdt,0,1)=='8'){
                if(strlen($sdt)!='9') {$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
                if(substr($sdt,1,1)=='9'){}else{
                    $this->session->set_flashdata('error','sdt phai la so mobi'); return 0; die;
                }
            }
            elseif(substr($sdt,0,1)=='9') {
                if(strlen($sdt)!=9) {$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
                if(substr($sdt,1,1)=='0' || substr($sdt,1,1)=='3') {}else{
                    $this->session->set_flashdata('error','sdt phai la so mobi'); return 0; die;
                }
            }
            elseif(substr($sdt,0,1)=='1') {
                if(strlen($sdt)!=10) {$this->session->set_flashdata('error','kt lai sdt'); return 0; die;}
                if(substr($sdt,2,1)=='0' || substr($sdt,2,1)=='1' || substr($sdt,2,1)=='2' || 
                    substr($sdt,2,1)=='6' || substr($sdt,2,1)=='8') 
                {}else{
                    $this->session->set_flashdata('error','sdt phai la so mobi ');return 0; die;
                }
            }
            $kq = $this->Server1_model->checktrung($sdt);
            if($kq==false) {$this->session->set_flashdata('error','sdt trung');return 0; die;}
            $real = $sdt;
            if(substr($sdt,0,1)=='1' || substr($sdt,0,1)=='9' )return 1;
            else return 0;
        }//check sdt
        public function napdulieu($sdt=0){
            
            if(!$this->checkdn()) { $this->session->set_flashdata('error','Bạn chưa đăng nhập, bấm vào <a href="http://banhoa.vienthongthanhnhan.com/server1/dangnhap">đây</a> để đăng nhập'); echo 0; die; }
            $baomat = $this->baomat();
            if(!$baomat) {echo 3; die;}
            $check = $this->checksdt($sdt,$sdt);
            if($check==0) {echo 0; die;}
            //$kq = $this->Server1_model->them($sdt);
            //if($kq) echo '1';
            //else echo '2';
            
            //$data['sdt'] = $sdt;
            //$this->load->view('napdulieu',$data);
            
            if($kq) echo '1';
            else echo '2';
            
        }
        public function hienloi(){
            $mess = $this->session->flashdata('error');
            echo $mess;
        }
        public function tiepnhandulieu(){
            // bảo mật
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //check ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //to check ip is pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            //if($ip!='115.78.235.246') die('404 page not founds ( 403 lavarel ) ');
            
            $this->load->model('Ketqua_model');
            //print_r($_POST); die; $_POST['sdt'] $_POST['sms'] $_POST['inviewid'] $_POST['get']
            if(empty($_POST['sdt'])) die('da them 0');
            $dem = count($_POST['sdt']);
            for($i = 0 ; $i < $dem ; $i++){
                $sdt = $_POST['sdt'][$i]; $sms = $_POST['sms'][$i]; 
                $inviewid = $_POST['inviewid'][$i]; $get = $_POST['get'][$i]; 
                $this->Ketqua_model->themketqua($sdt,$sms,$inviewid,$get);
            }// vong lap for
            //echo 'da them '. $dem;
            echo gmdate("H:i:s ( $dem )", time() + 3600*(7+date("I")));
        }
        public function hienketqua($idsdt=0){
            $this->load->model('Ketqua_model');
            $check = $this->checksdt($idsdt,$idsdt);
            if($check==0) {echo '2'; die;}
            $row = $this->Ketqua_model->hiends($idsdt);
            if(empty($row)) echo '3';
            else{
                $this->load->view('hienketqua',array(
                    'sdt'=>$row[0]['sdt'],'get'=>$row[0]['get'],'inviewid'=>$row[0]['inviewid'],'sms'=>$row[0]['sms']
                ));
            }
        }
        public function baomat(){
return true;
            // bảo mật
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //check ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //to check ip is pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            if($ip == '116.106.45.94' || $ip == '118.68.91.160' || $ip == '115.78.235.246') return true;
            return false;
        }
    }//controller
?>