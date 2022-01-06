$(() => 
{


	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table 	= $('#dt_basic').DataTable()
	$table.columns( 0 )
    .order( 'asc' )
    .draw()





	// Add Row
	const addRow = (data) => 
	{
		let row = [
			data.penyakit,
			data.dokter,
			data.judul,
			data.keterangan,
			'<div>'
				+'<button class="btn btn-primary btn-sm" onclick="Ubah('+data.id+')"><i class="fa fa-edit"></i> Ubah</button>'
				+'<button class="btn btn-danger btn-sm" onclick="Hapus('+data.id+')"><i class="fa fa-trash"></i> Hapus</button>'
			+'</div>'
		]
		
		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id)
	}

	// Edit Row
	const editRow = (id, data) => 
	{
		let row = $table.row('[data-id='+id+']').index()

		$($table.row(row).node()).attr('data-id',id)
		$table.cell(row, 0).data(data.penyakit)
		$table.cell(row, 1).data(data.dokter)
		$table.cell(row, 2).data(data.judul)
		$table.cell(row, 3).data(data.keterangan)
	}

	// Delete Row
	const deleteRow = (id) =>
	{
		$table.row('[data-id='+id+']').remove().draw()
	}





	// Fungsi simpan 
	$('#form').submit((ev) => 
	{
		ev.preventDefault()

		let id 			= $('#id').val()
		let penyakit 	= $('#penyakit').val()
		let judul 		= $('#judul').val()
		let keterangan 	= $('#keterangan').val()

		if(id == 0) {

			// Insert
			
			window.apiClient.saranData.insert(penyakit, judul, keterangan)
			.done((data) => 
			{
				$.doneMessage('Berhasil ditambahkan.','Saran Data')
				addRow(data)

			})
			.fail(($xhr) => 
			{
				$.failMessage('Gagal ditambahkan.','Saran Data')
			}).
			always(() => 
			{
				$('#myModal').modal('toggle')
			})
		}
		else {
			
			// Update
			
			window.apiClient.saranData.update(id, penyakit, judul, keterangan)
			.done((data) => 
			{
				$.doneMessage('Berhasil diubah.','Saran Data')
				editRow(id, data)
				
			})
			.fail(($xhr) => 
			{
				$.failMessage('Gagal diubah.','Saran Data')
			}).
			always(() => 
			{
				$('#myModal').modal('toggle')
			})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => 
	{
		
		let id 			= $("#idCheck").val()
		
		window.apiClient.saranData.delete(id)
		.done((data) => 
		{
			$.doneMessage('Berhasil dihapus.','Saran Data')
			deleteRow(id)
			
		})
		.fail(($xhr) => 
		{
			$.failMessage('Gagal dihapus.','Saran Data')
		}).
		always(() => 
		{
			$('#ModalCheck').modal('toggle')
		})
	})

	// Clik Tambah
	$('#tambah').on('click', () =>
	{
		$('#myModalLabel').html('Tambah Saran')
		$('#id').val('')
		$('#penyakit').val('')
		$('#judul').val('')
		$('#keterangan').val('')

		$('#myModal').modal('toggle')
	})

})

// Click Hapus
const Hapus = (id) =>
{
	$("#idCheck").val(id)
	$("#LabelCheck").text('Form Hapus')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
	$('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (id) =>
{
	window.apiClient.saranData.detail(id)
	.done((data) =>
	{

		$('#myModalLabel').html('Ubah Saran')
		$('#id').val(data.id)
		$('#penyakit').val(data.penyakit)
		$('#judul').val(data.judul)
		$('#keterangan').val(data.keterangan)

		$('#myModal').modal('toggle')
	})
	.fail(($xhr) => 
	{
		$.failMessage('Gagal mendapatkan data.','Saran Data')
	})
}