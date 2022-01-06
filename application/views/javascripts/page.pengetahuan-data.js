$(() => {


	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(0)
		.draw()





	// Add Row
	const addRow = (data) => {
		let row = [
			data.kode_penyakit,
			data.nama_penyakit,
			data.kode_gejala,
			data.nama_gejala,
			'<div>' +
			'<button class="btn btn-primary btn-sm" data-id="' + data.id + '"><i class="fa fa-edit"></i> Ubah</button>' +
			'<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id + ')"><i class="fa fa-trash"></i> Hapus</button>' +
			'</div>'
		]

		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id)
	}

	// Edit Row330
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index()

		$($table.row(row).node()).attr('data-id', id)
		$table.cell(row, 0).data(data.kode_penyakit)
		$table.cell(row, 1).data(data.nama_penyakit)
		$table.cell(row, 2).data(data.kode_gejala)
		$table.cell(row, 3).data(data.nama_gejala)
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}





	// Fungsi simpan 
	$('#form').submit((ev) => {
		ev.preventDefault()

		let id = $('#id').val()
		let id_gejala = $('#id_gejala').val()
		let id_penyakit = $('#id_penyakit').val()

		if (id == 0) {

			window.apiClient.pengetahuanData.insert(id_penyakit, id_gejala)
				.done((data) => {
					$.doneMessage('Berhasil ditambahkan.', 'Basis Pengetahuan Data')
					addRow(data)
				})
				.fail(($xhr) => {
					$.failMessage('Gagal ditambahkan.', 'Basis Pengetahuan Data')
					console.log($xhr)
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		} else {

			// Update

			window.apiClient.pengetahuanData.update(id, id_penyakit, id_gejala)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'Basis Pengetahuan Data')
					editRow(id, data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal diubah.', 'Basis Pengetahuan Data')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()
		window.apiClient.pengetahuanData.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Basis Pengetahuan Data')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Basis Pengetahuan Data')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

	// Clik Tambah
	$('#tambah').on('click', () => {
		$('#myModalLabel').html('Tambah Basis Pengetahuan')
		$('#id').val('0')
		$('#id_penyakit').val('')
		$('#id_gejala').val('')

		$('#myModal').modal('toggle')
	})

	$('.btn-ubah').on('click', function () {
		id = $(this).data('id');
		window.apiClient.pengetahuanData.detail(id)
			.done((data) => {

				$('#myModalLabel').html('Ubah Basis Pengetahuan')
				$('#id').val(data.id)
				$('#id_penyakit').val(data.id_penyakit)
				$('#id_gejala').val(data.id_gejala)
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
