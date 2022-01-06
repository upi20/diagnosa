$(() => {


	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(0)
		.order('asc')
		.draw()





	// Add Row
	const addRow = (data) => {
		let row = [
			data.code,
			data.nama,
			data.nilai,
			'<div>' +
			'<button class="btn btn-primary btn-sm" onclick="Ubah(' + data.id + ')"><i class="fa fa-edit"></i> Ubah</button>' +
			'<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id + ')"><i class="fa fa-trash"></i> Hapus</button>' +
			'</div>'
		]

		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id)
	}

	// Edit Row
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index()

		$($table.row(row).node()).attr('data-id', id)
		$table.cell(row, 0).data(data.code)
		$table.cell(row, 1).data(data.nama)
		$table.cell(row, 2).data(data.nilai)
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}





	// Fungsi simpan 
	$('#form').submit((ev) => {
		ev.preventDefault()

		let id = $('#id').val()
		let nama = $('#nama').val()
		let nilai = $('#nilai').val()

		if (id == 0) {

			// Insert

			window.apiClient.gejalaData.insert(nama, nilai)
				.done((data) => {
					$.doneMessage('Berhasil ditambahkan.', 'Gejala Data')
					addRow(data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal ditambahkan.', 'Gejala Data')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		} else {

			// Update

			window.apiClient.gejalaData.update(id, nama, nilai)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'Gejala Data')
					editRow(id, data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal diubah.', 'Gejala Data')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()

		window.apiClient.gejalaData.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Gejala Data')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Gejala Data')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

	// Clik Tambah
	$('#tambah').on('click', () => {
		$('#myModalLabel').html('Tambah Gejala')
		$('#id').val('')
		$('#nama').val('')
		$('#nilai').val('')

		$('#myModal').modal('toggle')
	})

})

// Click Hapus
const Hapus = (id) => {
	$("#idCheck").val(id)
	$("#LabelCheck").text('Form Hapus')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
	$('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (id) => {
	window.apiClient.gejalaData.detail(id)
		.done((data) => {

			$('#myModalLabel').html('Ubah Gejala')
			$('#id').val(data.id)
			$('#nama').val(data.nama)
			$('#nilai').val(data.nilai)

			$('#myModal').modal('toggle')
		})
		.fail(($xhr) => {
			$.failMessage('Gagal mendapatkan data.', 'Gejala Data')
		})
}
