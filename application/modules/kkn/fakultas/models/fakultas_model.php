<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Fakultas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function result($result){

        if ($result->num_rows()==1) {
            return $result->row_array();
        }elseif ($result->num_rows() > 1) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_all($limit, $uri) {

        $result = $this->db->get('fakultas', $limit, $uri);
        return $this->result($result);
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*'); //Faktur
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('kodef','ASC');
        $this->db->limit(1);

        $result=$this->db->get('{nama_tabel}');
        return $this->result($result);
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('kodef','DESC');
        $this->db->limit(1);

        $result=$this->db->get('{nama_tabel}');
        return $this->result($result);
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('{nama_tabel}');
        $this->db->where('faktur',$faktur); //field perlu disesuaikan dengan tabel
        $this->db->where('isactive',1);
        $this->db->group_by('faktur'); //field perlu disesuaikan dengan tabel
        $result = $this->db->get();
        return $this->result($result);

    }
    //fungsi dibawah ini biasanya digunakan untuk laporan
    //field dan tabel perlu disesuaikan dengan tabel
    function getdetail($data) {
        $this->db->select('id,Faktur as faktur,Jthtmp as jthtempo,NoBon as nobon,Supplier as kode,total,NmSupplier as nama,NoAccSup as noacc,Tgl as tanggal,IF(LEFT(NoAccSup,5)="1.700","Karyawan",IF(LEFT(NoAccSup,5)="1.250","Customer",IF(LEFT(NoAccSup,5)="2.300","Supplier","-"))) as tipe',FALSE);
        $this->db->from('{nama_tabel}');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('Supplier',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        $result = $this->db->get();
        return $this->result($result);
    }
    function genfaktur(){
        $last=$this->get_last();
        // print_r($last);
        if(!empty($last)):
            $faktur=genfaktur($last['faktur'],"PL");//diganti sesuai faktur/kode transaksi
        else:
            $faktur="PL".date('ym')."00001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($faktur);
    }
    function get_one($kodef) {
        $this->db->where('kodef', $kodef);
        $result = $this->db->get('{nama_tabel}');
        return $this->result($result);
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('{nama_tabel}', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('{nama_tabel}', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        {fields_tabel1}
            '{name_field_table}' => $this->input->post('{name_field_table}', TRUE),
           {/fields_tabel1}
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        {fields_tabel1}
            '{name_field_table}' => $this->input->post('{name_field_table}', TRUE),
           {/fields_tabel1}
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        //    'userid' => userid(),
        //    'datetime' => NOW(),
        //    'Time' => NOW(),
        return $data;
    }
    function save{nama_tabel}($data){
        $this->db->insert('{nama_tabel}',$data);
    }
    function save_detail($data){
        $this->db->insert('{nama_tabel}_detail',$data);
    }
    function upddel_detail($kodef=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('kodef', $kodef);
        $this->db->update('{nama_tabel}', $data);
       
    } 
    function updatebyid($kodef,$data){
        $this->db->where('kodef', $kodef);
        $this->db->update('{nama_tabel}', $data);
    }
    function update($kodef) {
        $data = array(
        'kodef' => $this->input->post('kodef',TRUE),{fields_tabel2}
       '{name_field_table}' => $this->input->post('{name_field_table}', TRUE),
       {/fields_tabel2}
        );
        $this->db->where('kodef', $kodef);
        $this->db->update('{nama_tabel}', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($kodef) {
        $this->db->where('kodef', $kodef);
        $this->db->delete('{nama_tabel}'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('{nama_tabel}_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('{nama_tabel}_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select kodef, '.$value.' from {nama_tabel} order by kodef asc');
        $result[0]="-- Pilih Urutan kodef --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kodef]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
