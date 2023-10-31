</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">

	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy;2023 <a href="#">Badan Usaha Milik Desa</a>.</strong> BUMDES.
</footer>
</div>
<!-- ./wrapper -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 3000)
</script>

<script type="text/javascript">
	$(function() {
		$("#btn_send_chat").click(function() {
			$.ajax({
				type: 'POST',
				dataType: "json",
				url: '<?= site_url('admin/send_mgs_chat') ?>',
				data: {
					'msg': $('#text_message_chat').val(),
					'id_pelanggan': $('#text_id_pelanggan').val()
				},
				success: function(msg) {
					console.log(msg);
					//alert('wow' + msg);
					$('.direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' + msg.nama_user + ' </span><span class="direct-chat-timestamp float-left">' + msg.time_chatting + '</span ></div><div class="direct-chat-text">' + msg.admin_send + '</div></div>');
				}
			});
			$('#text_message_chat').val('');
			$('#text_message_chat').focus();
		});
	});
</script>

</body>

</html>