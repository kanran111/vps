<?php 
    class Mtimsim extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public function themso($array){
            $this->db->query("delete from sim ");
            foreach($array as $row ){
                if(empty($row)) continue;
                $sdt = $row; $duoi_8 = substr($row,2,7); $duoi_7 = substr($row,3,6);
                $this->db->query("call sim_pro('$sdt','$duoi_8','$duoi_7');");
          
	     }
        }
        public function themngay($array){
            $this->db->query("delete from sim_ns");
            $dem = count($array); $temp = '';
            for($i=0;$i<$dem;$i++){
                if($i%2==0){//so dien thoai
                    $temp = $array[$i];
                }elseif($i%2!=0){//ngày sinh
                    $arrayns = explode('/',$array[$i]);
                    $count = count($arrayns);
                    if($count!=3) {continue;}// tiếp tục nếu đó ko đúng định dạng ngày
                    $d = $arrayns[0]; $m = $arrayns[1] ; $y = $arrayns[2];
                    if(checkdate($m,$d,$y)==false) {continue;}
                    $ngay = strtotime($y.'-'.$m.'-'.$d);
                    $this->db->query("insert into sim_ns (sdt,ngaysinh) values ('$temp','$ngay')");
                }
            }
        }//themngay
        public function timsotheoymuon($tukhoa=''){
            $kq = $this->db->query("select sdt from sim where sdt like '$tukhoa' order by rand() limit 15 ");
            $row = $kq->result_array(); $kq->free_result();
            return $row;
        }
        public function sodeptoday(){
            $this->db->query("delete from sim_dep");
            $kq = $this->db->query("select sdt from sim");
            $row = $kq->result_array(); $kq->free_result();
            $sodep = array();
            foreach ($row as $value){
                $sdt = $value['sdt'];
                $sdt = addcslashes($sdt,'0..9');
                $sdt_array =  explode('\\',$sdt); 
                $dem = count($sdt_array); 
                if($dem!=10) continue;
                else {
                    $b3 = $sdt_array[2]; $c3= $sdt_array[3]; $d3=$sdt_array[4];$e3 = $sdt_array[5]; $f3= $sdt_array[6]; $g3=$sdt_array[7];$h3 = $sdt_array[8]; 
                    $i3= $sdt_array[9];
                    if($d3==$g3) if($d3==$f3) if($g3 == $i3 ) $sodep['lapdeu1'][]=$sdt_array[1].$b3.$c3.'.'.$d3.$e3.$f3.'.'.$g3.$h3.$i3; 
                    if($d3==$g3){} elseif($d3==$f3) if($g3 == $i3 ) $sodep['lapdeu2'][]=$sdt_array[1].$b3.$c3.'.'.$d3.$e3.$f3.'.'.$g3.$h3.$i3;
                    if($d3==$f3) if($f3==$h3) $sodep['lapduoi1'][]=$sdt_array[1].$b3.$c3.'.'.$d3.$e3.'.'.$f3.$g3.'.'.$h3.$i3; 
                    
                    if($d3==$g3) if($d3==$f3) if($g3 == $i3 ) $sodep['lapdeu3'][]=$sdt_array[1].$b3.$c3.'.'.$d3.$e3.$f3.'.'.$g3.$h3.$i3;
                    //loi nen sua lai
                    $a3 = $sdt_array[2]; $b3= $sdt_array[3]; $c3=$sdt_array[4];$d3 = $sdt_array[5]; $e3= $sdt_array[6]; $f3=$sdt_array[7];$g3 = $sdt_array[8]; 
                    $h3= $sdt_array[9];
                    if($d3==$f3) if($f3==$h3) $sodep['lapduoi2'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.'.'.$e3.$f3.'.'.$g3.$h3;
                    if($d3.$e3 == $g3.$h3) $sodep['lapduoi3'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.'.'.$e3.'.'.$f3.$g3.'.'.$h3;
                    if($d3==$e3) if($g3 == $h3 ) $sodep['lapduoi4'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($d3.$e3 == $h3.$g3) $sodep['lapduoi5'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($c3==$d3) if($f3 == $g3 ) $sodep['denho1'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($c3.$d3 == $f3.$g3 ) $sodep['denho2'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($e3 == $g3 ) if($f3<=$h3) $sodep['cap1'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.'.'.$e3.$f3.'.'.$g3.$h3;
                    if($b3.$c3.$d3 == $f3.$g3.$h3) $sodep['cap2'][]=$sdt_array[1].$a3.'.'.$b3.$c3.$d3.'.'.$e3.'.'.$f3.$g3.$h3;
                    if($a3.$b3.$c3 == $f3.$g3.$h3) $sodep['cap3'][]=$sdt_array[1].'.'.$a3.$b3.$c3.'.'.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($a3.$b3.$c3 == $d3.$e3.$f3) $sodep['cap4'][]=$sdt_array[1].'.'.$a3.$b3.$c3.'.'.$d3.$e3.$f3.'.'.$g3.$h3;
                    if($sdt_array[1].$a3.$b3 == $c3.$d3.$e3) $sodep['daunguc1'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($sdt_array[1].$a3.$b3 == $f3.$g3.$h3) $sodep['daunguc2'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($sdt_array[1].$a3.$b3 == $e3.$d3.$c3) $sodep['dauduoi1'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($sdt_array[1].$a3.$b3 == $h3.$g3.$f3) $sodep['dauduoi2'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($a3 == $c3 && $a3 == $e3 ) $sodep['tamhoa1'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.'.'.$e3.$f3.'.'.$g3.$h3;
                    if($b3 == $d3 && $b3 == $f3 ) $sodep['tamhoa2'][]=$sdt_array[1].'.'.$a3.$b3.'.'.$c3.$d3.'.'.$e3.$f3.'.'.$g3.$h3;
                    if($b3 == $c3 && $b3 == $d3 ) $sodep['tamhoa3'][]=$sdt_array[1].$a3.'.'.$b3.$c3.$d3.'.'.$e3.$f3.$g3.$h3;
                    if($c3 == $d3 && $c3 == $e3 ) $sodep['tamhoa4'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                    if($d3 == $e3 && $d3 == $f3 ) $sodep['tamhoa5'][]=$sdt_array[1].$a3.'.'.$b3.$c3.'.'.$d3.$e3.$f3.'.'.$g3.$h3;
                    if($e3 == $f3 && $e3 == $g3 ) $sodep['tamhoa6'][]=$sdt_array[1].$a3.'.'.$b3.$c3.$d3.'.'.$e3.$f3.$g3.'.'.$h3;
                    if($f3 == $g3 && $f3 == $h3 ) $sodep['tamhoa7'][]=$sdt_array[1].$a3.$b3.'.'.$c3.$d3.$e3.'.'.$f3.$g3.$h3;
                }
            }//foreach
            
            if(empty($sodep)) die('ko tim thấy số nào');
             $chuoi = '';
            foreach($sodep as $key => $value){
                $dem = count($value);
                if(empty($dem)) continue;
                for($i=0;$i<$dem;$i++){
                    $sdt = $value[$i];
                    //$kq = $this->db->query("insert into sim_dep (sdt,loai) values ('$sdt','$key'))");
                    //$kq = $this->db->query("call them_sdt_dep('$sdt','$key'); ");
                    $chuoi .= ",('$sdt','$key')";
                    
                }
            }
            $sql = "insert into sim_dep (sdt,loai) values ( 'aaa', 'bbb' ) " . $chuoi;
            
            $kq = $this->db->query($sql);
            if(!$kq) die('có 1 vài câu lệnh chưa đúng');
            echo '<script>alert("thành công")</script>';
            
        }//sodeptoday
        public function hiensodep($loai = 'loai'){
            if($loai=='loai'){
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapdeu1' order by rand() limit 15 ");
                $row['lapdeu1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapdeu2' order by rand() limit 15 ");
                $row['lapdeu2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapduoi1' order by rand() limit 15 ");
                $row['lapduoi1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapduoi2' order by rand() limit 15 ");
                $row['lapduoi2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapdeu3' order by rand() limit 15 ");
                $row['lapdeu3'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapduoi3' order by rand() limit 15 ");
                $row['lapduoi3'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapduoi4' order by rand() limit 15 ");
                $row['lapduoi4'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'lapduoi5' order by rand() limit 15 ");
                $row['lapduoi5'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'denho1' order by rand() limit 15 ");
                $row['denho1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'denho2' order by rand() limit 15 ");
                $row['denho2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'cap1' order by rand() limit 15 ");
                $row['cap1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'cap2' order by rand() limit 15 ");
                $row['cap2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'cap3' order by rand() limit 15 ");
                $row['cap3'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'cap4' order by rand() limit 15 ");
                $row['cap4'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'daunguc1' order by rand() limit 15 ");
                $row['daunguc1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'daunguc2' order by rand() limit 15 ");
                $row['daunguc2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'dauduoi1' order by rand() limit 15 ");
                $row['dauduoi1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'dauduoi2' order by rand() limit 15 ");
                $row['dauduoi2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa1' order by rand() limit 15 ");
                $row['tamhoa1'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa2' order by rand() limit 15 ");
                $row['tamhoa2'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa3' order by rand() limit 15 ");
                $row['tamhoa3'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa4' order by rand() limit 15 ");
                $row['tamhoa4'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa5' order by rand() limit 15 ");
                $row['tamhoa5'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa6' order by rand() limit 15 ");
                $row['tamhoa6'] = $kq->result_array(); $kq->free_result();
                $kq = $this->db->query("select sdt from sim_dep where loai like 'tamhoa7' order by rand() limit 15 ");
                $row['tamhoa7'] = $kq->result_array(); $kq->free_result();
                return $row;
            }else{
                $kq = $this->db->query("select sdt from sim_dep where (loai like '$loai') order by rand() limit 15 ");
                $row = $kq->result_array(); $kq->free_result();
                return $row;
            }
        }
        public function timsim($sdt_array){
            $row_array = array();
            foreach ($sdt_array as $sdt){
                $sdt_array = array();
                if(empty($sdt)) continue;
                $pre = '/(^84|^0|^ | $)/i';
                $sdt = preg_replace($pre,'',$sdt);
                //đầu
                $sdt_array[] = substr($sdt,0,8);
                $sdt_array[] = substr($sdt,0,7);
                $sdt_array[] = substr($sdt,0,6);
                $demday = count($sdt_array);
                for($i=0;$i<$demday;$i++){
                    $sdt_xetduyet = $sdt_array[$i];
                    $sql = "select sdt from sim where match(sdt)  against ('$sdt_xetduyet*' IN BOOLEAN MODE ) ORDER BY rand(now()) limit 3";
                    $kq = $this->db->query($sql);
                    $row = $kq->result_array(); $kq->free_result();
                    foreach($row as $value ) {
                        $row_array[$sdt]['dau'][] = $value['sdt'];
                        }
                    if(!empty($row)) break;
                    if($i==2){
                        $row_array[$sdt]['dau'][] = ' ';
                    }
                }
                //đuôi
                $soduoi8 = substr($sdt,2,7);
                    $sql = "select sdt from sim where match(8duoi)  against ('$soduoi8' IN BOOLEAN MODE ) ORDER BY rand(now()) limit 5";
                    $kq = $this->db->query($sql);
                    $row = $kq->result_array(); $kq->free_result();
                if(!empty($row)){
                    foreach($row as $value ) $row_array[$sdt]['duoi'][] = $value['sdt'];
                }else{
                    $soduoi7 = substr($sdt,3,6);     
                    $sql = "select sdt from sim where match(7duoi)  against ('$soduoi7' IN BOOLEAN MODE ) ORDER BY rand(now()) limit 5";
                    $kq = $this->db->query($sql);
                    $row = $kq->result_array(); $kq->free_result();
                    foreach($row as $value ) $row_array[$sdt]['duoi'][] = $value['sdt'];
                    if(empty($row)) $row_array[$sdt]['duoi'][] = ' ';
                }
                //năm sinh
                    $ns = $this->db->query("select ngaysinh from sim_ns where sdt = '$sdt'")->row_array();//$ns['ngaysinh']
                    $ns_match =  date('dmy',$ns['ngaysinh']);
                    $sql = "select sdt from sim where match(7duoi)  against ('$ns_match' IN BOOLEAN MODE ) ORDER BY rand(now()) limit 5";
                    $kq = $this->db->query($sql);
                    $row = $kq->result_array(); $kq->free_result();
                    foreach($row as $value ) $row_array[$sdt]['ngaysinh'][] = $value['sdt'];
                    if(empty($row)) $row_array[$sdt]['ngaysinh'][] = ' ';
            }//row sdt
            
            return $row_array;
        }//timsim
        
    }
?>
