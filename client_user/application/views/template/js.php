<script src="<?= base_url() ?>assets/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
<script type="text/javascript">
    $(".form_date").datetimepicker({
    	format: 'yyyy-mm-dd',
    	weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>
<!-- <script type="text/javascript">
	$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script> -->