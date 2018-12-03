<div class="jumbotron bg-white">
	<div class="row">
		<div class="col">
		<h3 class="text-center">Data Fakultas</h3>
			<table id="datatables" class="table table-data table-responsive table-inverse table-sm" style="width: 100%">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Fakultas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
	
						<?php foreach ($display->data as $key => $value){?>
							
						<tr class="">

							<td><?php echo $value->kodef; ?></td>
							<td><?php echo $value->Fakultas; ?></td>
							<td><div class="btn-group table-data-feature" role="group" aria-label="Basic example">
								
								<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="zmdi zmdi-edit text-success"></i>
                                                    </button>
								<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
                                                    </button>
							</div></td>
						</tr>
						<?php }?>
					</tbody>
				</table>		
		</div>
	</div>
</div>

<?php  ?>
<?php //print_r($display->data) 
// _loadjs('https://code.jquery.com/jquery-1.9.1.min.js');
?>
	
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#datatables').DataTable();
	} );

</script>