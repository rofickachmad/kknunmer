
<div id="form_input" class="row gutter5">
    {php_open} echo form_open(base_url().'{nama_tabel}/submit',array('id'=>'addform','role'=>'form','class'=>'form')); {php_close}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='' id="kodef" name="kodef"> 
        {fields_tabel1}
        <div class="form-group">
            {php_open} echo form_label('{name_field_table} : ','{name_field_table}',array('class'=>'control-label')); {php_close}
            <div class="controls">
                {php_open} echo form_input('{name_field_table}',set_value('{name_field_table}', isset($default['{name_field_table}']) ? $default['{name_field_table}'] : ''),'id="{name_field_table}" class="form-control" placeholder="Masukkan {name_field_table}"'); {php_close}
            </div>
        </div>
        {/fields_tabel1}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    {php_open} echo form_close();{php_close}
</div>
