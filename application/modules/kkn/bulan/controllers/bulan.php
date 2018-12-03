<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bulan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('bulan_model','bulandb',TRUE);
        $this->session->set_userdata('lihat','bulan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

        /*UNTUK KEPERLUAN FORM*/
        /*$this->template->add_js('accounting.min.js');
        $this->template->add_js('jquery.maskMoney.min.js');   
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js'); //tanggal
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');*/
        
        /*ONLINE CDN*/
        /*$this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/jquery.maskmoney/3.0.2/jquery.maskMoney.min.js','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/accounting.js/0.3.2/accounting.min.js','cdn');
        */
    }

    public function index() {
        $this->template->set_title('Kelola Bulan');
        $this->template->add_js('var baseurl="'.base_url().'bulan/";','embed');  
        $this->template->load_view('bulan_view',array(
            'view'=>'',
            'title'=>'Kelola Data Bulan',
            'subtitle'=>'Pengelolaan Bulan',
            'breadcrumb'=>array(
            'Bulan'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Bulan');
        $this->template->add_js('var baseurl="'.base_url().'bulan/";','embed');  
        $this->template->load_view('bulan_view',array(
            'view'=>'Bulan_data',
            'title'=>'Kelola Data Bulan',
            'subtitle'=>'Pengelolaan Bulan',
            'breadcrumb'=>array(
            'Bulan'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Bulan');
        $this->template->add_js('var baseurl="'.base_url().'bulan/";','embed');  
        $this->template->load_view('bulan_view',array(
            'view'=>'',
            'title'=>'Kelola Data Bulan',
            'subtitle'=>'Pengelolaan Bulan',
            'breadcrumb'=>array(
            'Bulan'),
        ));
        
    }

     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        
            $this->datatables->select('bulan,{fields_tabel1}{name_field_table},{/fields_tabel1}')
                            ->from('{nama_tabel}');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('{nama_tabel}/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'bulan');
            $this->datatables->unset_column('bulan');

       
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('{nama_tabel}');
    }
    function isadmin(){
       return $this->ion_auth->is_admin();
    }
    function getuser(){
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
            if (!empty($user)):
                $userid=$user->id;
                return $userid;
            else:
                return array();
            endif;
        endif;
    }
    function forms(){   

        $this->load->view('{nama_tabel}_form_inside');
           
    }

    public function get($bulan=null){
        if($bulan!==null){
            echo json_encode($this->{nama_tabel}db->get_one($bulan));
        }
    }
    function tables(){
        $this->load->view('{nama_tabel}_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->{nama_tabel}db->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";
            $i=0;
            foreach ($data as $key => $value) {
                # code...
                
                
                    $div.="<tr>";
                
                $div.="<td>".$key."</td>";
                $div.="<td>".$value."</td>";
                    $div.="</tr>";
                
                $i++;

            }
            $div.="</table>";
           echo $div;
      
        }
      
    }
    function __formvalidation(){
    {fields_tabel2}
         $this->form_validation->set_rules('{name_field_table}','{name_field_table}','required|trim|xss_clean');
    {/fields_tabel2}         

        if ($this->form_validation->run() == FALSE)
            {
                // $this->session->set_flashdata(validation_errors());             
                return json_encode(array('st'=>0, 'msg' => validation_errors()));
                // return FALSE;
            }
        else{
            return TRUE;
        }
        // return $status;
    }

    public function submit(){
        if($this->__formvalidation()===TRUE):
         
            if ($this->input->post('ajax')){
              if ($this->input->post('bulan')){
                $this->{nama_tabel}db->update($this->input->post('bulan'));
              }else{
                //$this->{nama_tabel}db->save();
                $this->{nama_tabel}db->saveas();
              }

            }else{
              if ($this->input->post('submit')){
                  if ($this->input->post('bulan')){
                    $this->{nama_tabel}db->update($this->input->post('bulan'));
                  }else{
                    //$this->{nama_tabel}db->save();
                    $this->{nama_tabel}db->saveas();
                  }
              }
            }
        echo json_encode(array('st'=>1, 'msg' => '<h3 class="text-center alert-success alert"><i class="fa fa-check fa2x" ></i> Berhasil</h3>'));
        else:
            echo $this->__formvalidation();
        endif;
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->{nama_tabel}db->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['bulan'])){
                $this->{nama_tabel}db->upddel_detail($this->input->post('bulan'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Delete Detail!</strong> Sukses...
            </div>';
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
            
        }
    } 
     public function delete_detailxx(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['bulan'])){
                $this->{nama_tabel}db->delete_detail($this->input->post('bulan'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    

    

}

/** Module bulan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com Update Agustus 2018 */
