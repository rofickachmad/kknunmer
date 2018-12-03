<h2>Detail bulan</h2>
<table class="table table-hover table-condensed table-striped" style="width:100%">
   <tbody>
   

        {fields_tabel1}
        <tr>
            <td class="text-right">{name_field_table}</td>
            <td style="width:10px">:</td>
            <td class="text-left">{php_open} echo !empty($data['{name_field_table}'])?$data['{name_field_table}']:''; {php_close}</td>
        
        </tr>
        {/fields_tabel1}


    </tbody>
</table>
