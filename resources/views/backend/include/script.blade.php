</div>
<!-- body content end -->

	<!-- jquery lib file -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- jqeury ui js -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- the main bootstrap file -->
	<script type="text/javascript" src="{{ asset('backend/js/bootstrap.min.js') }}" ></script>

	<!-- data table js -->
	<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	
	<!-- the main js file -->
	<script type="text/javascript" src="{{ asset('backend/js/main.js') }}" ></script>

    <script type="text/javascript">
        $(document).ready( function () {
			$('#myTable').DataTable();
			$('#myTable2').DataTable();
        });
	</script>
	
	@yield('js')


