<?php 
    class Timsim extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Mtimsim');
            $this->load->helper('url');
            
        }
        public function index(){
            $this->load->view('timsim_view');
        }
        public function loadform($action=''){
            if(empty($action)) die;
            $data['action'] = $action;
            $this->load->view('timsim/form.php',$data);
        }
        public function sodeptoday($loai='loai'){
            $array = $this->Mtimsim->hiensodep($loai);
            $data['row']= $array;
            $this->load->view('timsim/viewsodep.php',$data);
        }
        public function timsodep($tukhoa=''){
            //$tukhoa = urldecode($tukhoa);
            $tukhoa=str_replace( '*', '%', $tukhoa );$tukhoa=str_replace( '.', '%', $tukhoa );
            $tukhoa=str_replace( '/', '%', $tukhoa );$tukhoa=str_replace( '\'', '%', $tukhoa );
            $tukhoa=str_replace( '\\', '%', $tukhoa );$tukhoa=str_replace( '"', '%', $tukhoa );
            $tukhoa=str_replace( '+', '%', $tukhoa );$tukhoa=str_replace( '?', '%', $tukhoa );
            //$tukhoa= preg_replace('/[\W]/i','%',$tukhoa);
            if(empty($tukhoa)) die('nhap tu khoa');
            //$tukhoa = xss_clean($tukhoa);
            $tukhoaxuat = $tukhoa;
            $demtukhoa = strlen($tukhoa); if($demtukhoa<2) die('vui long nhap 2 ki tu');
            if($demtukhoa>=20) die('ki tu qua nhieu');
            $check = strpos($tukhoa, "'" ); $check1 = strpos($tukhoa, '"' ); $check2 = strpos($tukhoa, '/' ); 
            $check3 = strpos($tukhoa, '\\' );
            if($check!=false || $check1!=false || $check2!=false || $check3!=false ) die('chuỗi bạn tim chứa kí tự ko hợp lệ');
            $demkitudacbiet= substr_count($tukhoa, '%');
            if(empty($demkitudacbiet)) $tukhoa = '%'.$tukhoa.'%';
            $tukhoa = str_replace('*','%',$tukhoa);
            //if($demkitudacbiet>1) die('ban chi dc phep nhap 1 dau *');
            //$vitrikitudacbiet = strpos($tukhoa,'*');
            //    if($vitrikitudacbiet==($demtukhoa-1)) $tukhoa = str_replace('*','%',$tukhoa);
            //    elseif($vitrikitudacbiet==0) $tukhoa = str_replace('*','%',$tukhoa);
            //    else $tukhoa = str_replace('*','%',$tukhoa);
            $row = $this->Mtimsim->timsotheoymuon($tukhoa);
            $data['row'] = $row; $data['tukhoa'] = $tukhoaxuat;
            $view = $this->load->view('timsim/dathang.php',$data,true);
            $data['timsimdep'] = $view;
            $this->load->view('timsim_view',$data);
        }
        public function locsodep(){
            $array = $this->Mtimsim->sodeptoday();
        }
        public function timsimgiong($action=''){
            $this->form_validation->set_rules('sdt_tim','Số đt','required');
            if($this->form_validation->run()){
                $sdt = $this->input->post('sdt_tim');
                $check = strpos($sdt, "'" ); $check1 = strpos($sdt, '"' );
                //var_dump($check);var_dump($check1); die;
                if($check!=false || $check1!=false) die('not alowed');
                
                $sdt = xss_clean($sdt);
                $array_sdt = preg_split('/[\s]+/i',$sdt);
                //print_r($array_sdt); 
                if(empty($array_sdt)){
                    echo '<script>alert("chưa có dữ liệu")</script>';
                }else{
                    $dem = count($array_sdt);
                    if(empty($dem) ) die('bạn phải nhập sdt vào');
                    if($action=='xuat') $array = $this->Mtimsim->timsim($array_sdt);
                    elseif($action=='hiensimgiong') $array = $this->Mtimsim->timsim($array_sdt);
                    echo '<script>alert("tim Thành Công '.$dem.' số")</script>';
                }
            }
            if($action=='xuat'){
                $data_dathang['row'] = $array;
                $this->load->view('timsim/xuatexcel',$data_dathang);
                
            }else{
                $data_dathang['row'] = $array;
                $this->load->view('timsim/viewexcel',$data_dathang);
            }
        }
        public function adminthemsimso(){
            //print_r($_POST);
            $this->form_validation->set_rules('sdt','Số đt','required');
            if($this->form_validation->run()){
                $sdt = $this->input->post('sdt');
                $array_sdt = preg_split('/[\s]+/i',$sdt);
                //print_r($array_sdt); 
                if(empty($array_sdt)){
                    echo '<script>alert("chưa có dữ liệu")</script>';
                }else{
                    $dem = count($array_sdt);
                    $this->Mtimsim->themso($array_sdt);
                    echo '<script>alert("Thêm Thành Công '.$dem.' số")</script>';
                }
            }
            $data_themsim = '';
            $data['subview'] = $this->load->view('timsim/themsim',$data_themsim,true);
            $data['titlePage'] = 'quản trị thêm sim';
            $this->load->view('timsim/admin',$data);
        }
        public function adminthemsimngay(){
            //echo strtotime('2015-10-10'); die;
            $this->form_validation->set_rules('sdt','Số đt','required');
            if($this->form_validation->run()){
                $sdt = $this->input->post('sdt');
                $array_sdt = preg_split('/[\s]+/i',$sdt);
                //print_r($array_sdt); die; 
                if(empty($array_sdt)){
                    echo 'chưa có dữ liệu';
                }else{
                    $dem = count($array_sdt);
                    $this->Mtimsim->themngay($array_sdt);
                    echo '<script>alert("Thêm Thành Công '.$dem.' số")</script>';
                }
            }
            $data_themsim = '';
            $data['subview'] = $this->load->view('timsim/themsim',$data_themsim,true);
            $data['titlePage'] = 'quản trị thêm sim';
            $this->load->view('timsim/admin',$data);
        }
        public function checksdt($sdt){
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
        }
    }
?>