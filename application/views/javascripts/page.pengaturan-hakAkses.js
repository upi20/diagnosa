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
			data.level,
			data.menu,
			data.sub_menu,
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
		$table.cell(row, 0).data(data.level)
		$table.cell(row, 1).data(data.menu)
		$table.cell(row, 2).data(data.sub_menu)
	}

	// Delete Row
	const deleteRow = (id) =>
	{
		$table.row('[data-id='+id+']').remove().draw()
	}





	// Sub menu
	$('#menu').on('change', () =>
	{
		let menu 		= $('#menu').val()

		window.apiClient.pengaturanHakAkses.subMenu(menu)
		.done((data) =>
		{
			$('#sub_menu').html('<option value="">--Pilih Sub Menu--</option>')

			$.each(data, (value, key) =>
			{
				$('#sub_menu').append("<option value='"+key.menu_id+"'>"+key.menu_nama+"</option>")
			})
		})
	})


	// Fungsi simpan 
	$('#form').submit((ev) => 
	{
		ev.preventDefault()

		let id 			= $('#id').val()
		let level 		= $('#level').val()
		let menu 		= $('#menu').val()
		let sub_menu 	= $('#sub_menu').val()

		if(id == 0) {

			// Insert
			
			window.apiClient.pengaturanHakAkses.insert(level, menu, sub_menu)
			.done((data) => 
			{
				$.doneMessage('Berhasil ditambahkan.','Pengaturan Hak Akses')
				addRow(data)

			})
			.fail(($xhr) => 
			{
				$.failMessage('Gagal ditambahkan.','Pengaturan Hak Akses')
			}).
			always(() => 
			{
				$('#myModal').modal('toggle')
			})
		}
		else {
			
			// Update
			
			window.apiClient.pengaturanHakAkses.update(id, level, menu, sub_menu)
			.done((data) => 
			{
				$.doneMessage('Berhasil diubah.','Pengaturan Hak Akses')
				editRow(id, data)
				
			})
			.fail(($xhr) => 
			{
				$.failMessage('Gagal diubah.','Pengaturan Hak Akses')
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
		
		window.apiClient.pengaturanHakAkses.delete(id)
		.done((data) => 
		{
			$.doneMessage('Berhasil dihapus.','Pengaturan Hak Akses')
			deleteRow(id)
			
		})
		.fail(($xhr) => 
		{
			$.failMessage('Gagal dihapus.','Pengaturan Hak Akses')
		}).
		always(() => 
		{
			$('#ModalCheck').modal('toggle')
		})
	})

	// Clik Tambah
	$('#tambah').on('click', () =>
	{
		$('#myModalLabel').html('Tambah Hak Akses')
		$('#id').val('')
		$('#menu').val('')
		$('#level').val('')
		$('#sub_menu').val('')

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
	window.apiClient.pengaturanHakAkses.detail(id)
	.done((data) =>
	{

		$('#myModalLabel').html('Ubah Hak Akses')
		$('#id').val(data.id)
		$('#level').val(data.level)
		$('#menu').val(data.menu)
		$('#sub_menu').val(data.sub_menu)
		
		// Sub menu
		window.apiClient.pengaturanHakAkses.subMenu(data.menu)
		.done((data) =>
		{
			$('#sub_menu').html('<option value="">--Pilih Sub Menu--</option>')

			$.each(data, (value, key) =>
			{
				$('#sub_menu').append("<option value='"+key.menu_id+"'>"+key.menu_nama+"</option>")
			})
			
		})



		$('#myModal').modal('toggle')
	})
	.fail(($xhr) => 
	{
		$.failMessage('Gagal mendapatkan data.','Pengaturan Hak Akses')
	})
}