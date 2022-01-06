$(() => {


	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(0)
		.draw()





	// Add Row
	const addRow = (data) => {
		let row = [
			data.judul,
			data.keterangan,
			data.harga,
			data.durasi,
			'<div>' +
			'<button class="btn btn-primary btn-sm" data-id="' + data.id_program + '"><i class="fa fa-edit"></i> Ubah</button>' +
			'<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id_program + ')"><i class="fa fa-trash"></i> Hapus</button>' +
			'</div>'
		]

		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id_program)
	}

	// Edit Row330
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index()

		$($table.row(row).node()).attr('data-id', id)
		$table.cell(row, 0).data(data.judul)
		$table.cell(row, 1).data(data.keterangan)
		$table.cell(row, 2).data(data.harga)
		$table.cell(row, 3).data(data.durasi)
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}





	// Fungsi simpan 
	$('#form').submit((ev) => {
		ev.preventDefault()

		let id = $('#id').val()
		let judul = $('#judul').val()
		let keterangan = $('#keterangan').val()
		let harga = $('#harga').val()
		let durasi = $('#durasi').val()

		if (id == 0) {

			window.apiClient.programData.insert(harga, judul, keterangan, durasi)
				.done((data) => {
					$.doneMessage('Berhasil ditambahkan.', 'Program Data')
					addRow(data)
				})
				.fail(($xhr) => {
					$.failMessage('Gagal ditambahkan.', 'Program Data')
					console.log($xhr)
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		} else {

			// Update

			window.apiClient.programData.update(id, harga, judul, keterangan, durasi)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'Program Data')
					editRow(id, data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal diubah.', 'Program Data')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()
		window.apiClient.programData.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Program Data')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Program Data')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

	// Clik Tambah
	$('#tambah').on('click', () => {
		$('#myModalLabel').html('Tambah Program')
		$('#id').val('')
		$('#harga').val('')
		$('#judul').val('')
		$('#durasi').val('')
		$('#keterangan').val('')

		$('#myModal').modal('toggle')
	})

	$('.btn-ubah').on('click', function () {
		id = $(this).data('id');
		window.apiClient.programData.detail(id)
			.done((data) => {

				$('#myModalLabel').html('Ubah Program')
				$('#id').val(data.id)
				$('#judul').val(data.judul)
				$('#keterangan').val(data.keterangan)
				$('#harga').val(data.harga)
				$('#durasi').val(data.durasi)
				$('#myModal').modal('toggle')
			})
			.fail(($xhr) => {
				$.failMessage('Gagal mendapatkan data.', 'Gejala Data')
				console.log($xhr)
			})
	})
})

// Click Hapus
const Hapus = (id) => {
	$("#idCheck").val(id)
	$("#LabelCheck").text('Form Hapus')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
	$('#ModalCheck').modal('toggle')
}
