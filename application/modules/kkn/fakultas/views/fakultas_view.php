<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form {k_nama_tabel}</h5>
                        
                    </div>
                    <div class="ibox-content">
                    {php_open} 
                        if(!empty($view)):
                            $this->load->view($view);
                        else:
                            $this->load->view('{nama_tabel}_table');
                        endif;
                    {php_close}


                    </div>
                </div>
                </div>
               
            </div>
          
            
</div>
{php_open} $this->load->view('modal-id'); {php_close}

