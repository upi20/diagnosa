
$(() =>
{
	
	// RENDER CHAT
	function render(nama, message, id)
	{
		let warna 	= (id == user_id) ? 'bg-success' : 'bg-primary'
		
		$('#show-data').append('<tr class="'+ warna +'">'
			+'<td width="10%">'+ nama +'</td>'
			+'<td class="pull-left">'+ message +'</td>'
		+'</tr>')
	}


	$('#pasien').select2()

	// Load websocket
    let pusher  = new Pusher('711b19f530583c9309c4', 
    {
        cluster: 'ap1'
    })

    let channel = pusher.subscribe('chat')
    
    
    // check message notification
    channel.bind('send-message', function(data)
    {
    	if(data.id_tujuan == user_id)
    	{
	    	if(data.data)
	    	{
	    		let d = data.data.split('|')

				$.doneMessage(d[0] + ' mengirim pesan baru.','Chat')

				render(d[0], d[1], data.id)
	    	}
    	}
    	else if(data.id == user_id)
    	{
    		if(data.data)
    		{
    			let d = data.data.split('|')

    			render(d[0], d[1], data.id)
    		}
    	}

    })

    // Send message
	$('#form').submit((ev) =>
	{
		ev.preventDefault()
		
		let message = $('#message').val()
		let pas 	= $('#pas').val()


		window.apiClient.chat.submitUser(pas, message)
		.success((data) =>
		{
			$.doneMessage('Pesan terkirim.','Chat')

			$('#message').val('')
		})
		.fail(($xhr) =>
		{
			$.failMessage('Gagal mengirim pesan.','Chat')

			console.log($xhr)
		})

	})	
})