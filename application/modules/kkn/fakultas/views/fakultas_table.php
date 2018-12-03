<div class="tabbable page-tabs">
    
     <div class="btn-group" style="margin:20px 0px 30px">
        
        <a href="#outside" data-toggle="tab" class="btn btn-lg btn-success"><i class="fa fa-plus"></i>Fakultas Baru </a>
        <a href="#inside" data-toggle="tab" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Fakultas</a>
    </div>
    <div class="tab-content">
        
        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside">
            <!-- AJAX source -->
            <div class="panel panel-default">
             
                <div class="panel-body">
                   
                    {php_open} $this->load->view('{nama_tabel}_data') {php_close}
                </div>
            </div>
            <!-- /saving state -->
        </div>
        <!-- /first tab content -->
        {php_open} $this->load->view('{nama_tabel}_form') {php_close}
    </div>
</div>
