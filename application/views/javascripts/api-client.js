$(() => {

	const initAjax = () => {
		$.ajaxSetup({
			accepts: ['application/json'],
			dataType: 'json'
		})
	}

	window.apiClient = {
		login: {

			cekLogin(username, password) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>login/doLogin',
					data: {
						username: username,
						password: password
					}
				})
			}

		},
		registrasi: {

			submit(email, username, phone, password) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>registrasi/submit',
					data: {
						email: email,
						username: username,
						phone: phone,
						password: password,
					}
				})
			}

		},
		chat: {

			submitUser(doc, message) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>chat/send_message_user',
					data: {
						doc: doc,
						message: message
					}
				})
			}

		},
		pengetahuanData: {
			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengetahuan/data/getDataDetail/' + id,
					data: {
						id: id
					}
				})
			},

			insert(id_penyakit, id_gejala) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengetahuan/data/insert',
					data: {
						id_gejala: id_gejala,
						id_penyakit: id_penyakit
					}
				})
			},

			update(id, id_penyakit, id_gejala) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengetahuan/data/update',
					data: {
						id: id,
						id_gejala: id_gejala,
						id_penyakit: id_penyakit
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengetahuan/data/delete',
					data: {
						id: id
					}
				})
			}

		},
		programData: {
			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>program/data/getDataDetail/' + id,
					data: {
						id: id
					}
				})
			},

			insert(harga, judul, keterangan, durasi) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>program/data/insert',
					data: {
						judul: judul,
						keterangan: keterangan,
						harga: harga,
						durasi: durasi
					}
				})
			},

			update(id, harga, judul, keterangan, durasi) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>program/data/update',
					data: {
						id: id,
						judul: judul,
						keterangan: keterangan,
						harga: harga,
						durasi: durasi
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>program/data/delete',
					data: {
						id: id
					}
				})
			}

		},
		saranData: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>saran/data/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(penyakit, judul, keterangan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>saran/data/insert',
					data: {
						penyakit: penyakit,
						judul: judul,
						keterangan: keterangan
					}
				})
			},

			update(id, penyakit, judul, keterangan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>saran/data/update',
					data: {
						id: id,
						penyakit: penyakit,
						judul: judul,
						keterangan: keterangan
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>saran/data/delete',
					data: {
						id: id
					}
				})
			},

		},
		gejalaData: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>gejala/data/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(nama, nilai) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>gejala/data/insert',
					data: {
						nama: nama,
						nilai: nilai
					}
				})
			},

			update(id, nama, nilai) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>gejala/data/update',
					data: {
						id: id,
						nama: nama,
						nilai: nilai
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>gejala/data/delete',
					data: {
						id: id
					}
				})
			},

		},
		penyakitData: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>penyakit/data/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(nama, min, max, derajat_kepercayaan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>penyakit/data/insert',
					data: {
						nama: nama,
						min: min,
						derajat_kepercayaan: derajat_kepercayaan,
						max: max
					}
				})
			},

			update(id, nama, min, max, derajat_kepercayaan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>penyakit/data/update',
					data: {
						id: id,
						nama: nama,
						min: min,
						derajat_kepercayaan: derajat_kepercayaan,
						max: max
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>penyakit/data/delete',
					data: {
						id: id
					}
				})
			},

		},
		pengaturanLevel: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/insert',
					data: {
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/update',
					data: {
						id: id,
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/delete',
					data: {
						id: id
					}
				})
			},

		},
		pengaturanMenu: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/insert',
					data: {
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/update',
					data: {
						id: id,
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/delete',
					data: {
						id: id
					}
				})
			},

		},
		pengaturanHakAkses: {

			subMenu(menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/subMenu',
					data: {
						menu: menu
					}
				})
			},

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(level, menu, sub_menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/insert',
					data: {
						level: level,
						menu: menu,
						sub_menu: sub_menu
					}
				})
			},

			update(id, level, menu, sub_menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/update',
					data: {
						id: id,
						level: level,
						menu: menu,
						sub_menu: sub_menu
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/delete',
					data: {
						id: id
					}
				})
			},

		},
		pengaturanPengguna: {

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/getDataDetail',
					data: {
						id: id
					}
				})
			},

			insert(level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/insert',
					data: {
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			update(id, level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/update',
					data: {
						id: id,
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/delete',
					data: {
						id: id
					}
				})
			},

		},
		format: {

			number(angka, prefix) {
				if (angka) {
					let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
						split = number_string.split(','),
						sisa = split[0].length % 3,
						rupiah = split[0].substr(0, sisa),
						ribuan = split[0].substr(sisa).match(/\d{3}/gi)

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if (ribuan) {
						separator = sisa ? '.' : ''
						rupiah += separator + ribuan.join('.')
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah

					// return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '')
					return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '')
				} else {
					return 0
				}
			},

			splitString(stringToSplit, separator) {
				let arrayOfStrings = stringToSplit.split(separator)

				return arrayOfStrings.join('')
			},

			terbilang(nilai) {
				var bilangan = nilai
				var kalimat = ""
				var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')
				var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan')
				var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun')
				var panjang_bilangan = bilangan.length

				// panjang_bilangan = 14
				/* pengujian panjang bilangan */
				if (panjang_bilangan > 15) {
					kalimat = "Diluar Batas"
				} else {
					/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
					for (i = 1; i <= panjang_bilangan; i++) {
						angka[i] = bilangan.substr(-(i), 1)
					}

					var i = 1
					var j = 0

					/* mulai proses iterasi terhadap array angka */
					while (i <= panjang_bilangan) {
						subkalimat = ""
						kata1 = ""
						kata2 = ""
						kata3 = ""

						/* untuk Ratusan */
						if (angka[i + 2] != "0") {
							if (angka[i + 2] == "1") {
								kata1 = "Seratus"
							} else {
								kata1 = kata[angka[i + 2]] + " Ratus"
							}
						}

						/* untuk Puluhan atau Belasan */
						if (angka[i + 1] != "0") {
							if (angka[i + 1] == "1") {
								if (angka[i] == "0") {
									kata2 = "Sepuluh"
								} else if (angka[i] == "1") {
									kata2 = "Sebelas"
								} else {
									kata2 = kata[angka[i]] + " Belas"
								}
							} else {
								kata2 = kata[angka[i + 1]] + " Puluh"
							}
						}

						/* untuk Satuan */
						if (angka[i] != "0") {
							if (angka[i + 1] != "1") {
								kata3 = kata[angka[i]]
							}
						}

						/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
						if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
							subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " "
						}

						/* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
						kalimat = subkalimat + kalimat
						i = i + 3
						j = j + 1
					}

					/* mengganti Satu Ribu jadi Seribu jika diperlukan */
					if ((angka[5] == "0") && (angka[6] == "0")) {
						kalimat = kalimat.replace("Satu Ribu", "Seribu")
					}
				}

				return kalimat
			}

		},
	}

	initAjax()
})
