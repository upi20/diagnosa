$(() =>
{

	$('#rpassword').on('change', () =>
	{
		let password 	= $('#password').val()
		let rpassword 	= $('#rpassword').val()

		if(password != rpassword)
		{
			$.warningMessage('Password tidak sama !', 'REGISTRASI')

			$('#submit').prop('disabled', 'disabled')

			$('#rpassword').val('')
			$('#rpassword').focus()
		}
		else
		{
			$.doneMessage('Password sudah sama !', 'REGISTRASI')

			$('#submit').prop('disabled', false)
		}
	})


	$('#form').submit((ev) =>
	{
		ev.preventDefault()

		let email 		= $('#email').val()
		let username 	= $('#username').val()
		let phone 		= $('#phone').val()
		let password 	= $('#password').val()

		window.apiClient.registrasi.submit(email, username, phone, password)
		.done((data) =>
		{
			$.doneMessage('Registrasi success.', 'REGISTRASI')

			setInterval(() => { window.location.href = '<?= base_url() ?>login' }, 1000)
		})
	})
})