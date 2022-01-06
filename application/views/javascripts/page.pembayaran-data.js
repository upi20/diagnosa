$(() => {


	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(0)
		.order('asc')
		.draw()
	$('.detail').on('click', '.detail2', function (e) {
		id = $(this).data('id');
		$.ajax({
			url: '<?= base_url()?>pembayaran/data/detail/' + id,
			method: 'GET',
			dataType: 'JSON',
			success(data) {
				$('.nama-pasien').text(`@${data.user_nama}`)
				$('.email-pasien').text(data.user_email)
				$('.bukti-pembayaran').attr('src', `<?= base_url()?>uploads/pembayaran/${data.gambar}`)
				$('.paket-dipilih').text(data.judul)
				$('.status').text(data.status)
				$('.masa-berlaku').text(data.durasi)
				$('.tanggal-membeli').text(data.tanggal)
				$('.tanggal-diterima').text(data.tanggal_diterima)
				$('.tujuan-pembayaran').text(data.tujuan_pembayaran)
			},
			error(xhr) {
				console.log(xhr)
			}
		})
		$('#myModal').modal('toggle')
	})
})
