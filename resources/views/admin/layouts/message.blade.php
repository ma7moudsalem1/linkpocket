@if(Session::has('flash_message'))
	<script type="text/javascript">
		swal({
		  title: "{{ Session::get('flash_message') }}",
		  text: "This message will close in 3 seconds.",
		  imageUrl: "{{ Request::root().'/public/cus/alert.png' }}",
		  timer: 3000,
		  showConfirmButton: false
		});
	</script>
@endif

@if(Session::has('cusMessage'))
	<script type="text/javascript">
		swal({
		  title: "{{ Session::get('cusMessage') }}",
		  text: "This message will close in 3 seconds.",
		  imageUrl: "{{ Request::root().'/public/cus/alert2.png' }}",
		  timer: 3000,
		  showConfirmButton: false
		});
	</script>
@endif

