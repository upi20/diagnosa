<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Chat';

		if ($this->session->userdata('data')['level'] == 'Pengguna') {
			$this->content 				= 'chat';
		} else {
			$this->content 				= 'chat-dokter';
		}

		$this->navigation 				= ['Chat'];
		$this->plugins 					= ['select2'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';
		$this->breadcrumb_2 			= 'Chat';
		$this->breadcrumb_2_url 		= '#';

		// Send data to view
		$this->data['program']		= $this->chat->getProgram();
		$this->data['dokter'] 			= $this->chat->getDokter();
		$this->data['pasien'] 			= $this->chat->getPasien();
		$this->data['list_pasien'] 		= $this->chat->getListPasien();
		$this->data['member']	= $this->chat->member();
		$this->render();
	}
	public function start()
	{
		$q 								= $this->input->get('dokter');

		$create_chat 					= $this->chat->create_chat($q);
		$last_chat 						= $this->chat->getLastChat($q);

		// Page Settings
		$this->title 					= 'Chat';
		$this->content 					= 'chat';
		$this->navigation 				= ['Chat'];
		$this->plugins 					= ['select2'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';
		$this->breadcrumb_2 			= 'Chat';
		$this->breadcrumb_2_url 		= '#';

		// Send data to view
		$this->data['member']	= $this->chat->member();
		$this->data['program']		= $this->chat->getProgram();
		$this->data['dokter'] 			= $this->chat->getDokter();
		$this->data['doc'] 				= $q;
		$this->data['last_chat'] 		= $last_chat;


		$this->render();
	}


	public function start_dokter()
	{
		$q 								= $this->input->get('pasien');

		$create_chat 					= $this->chat->create_chat($q);
		$last_chat 						= $this->chat->getLastChatDokter($q);

		// Page Settings
		$this->title 					= 'Chat';
		$this->content 					= 'chat-dokter';
		$this->navigation 				= ['Chat'];
		$this->plugins 					= ['select2'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Home';
		$this->breadcrumb_1_url 		= base_url() . 'home';
		$this->breadcrumb_2 			= 'Chat';
		$this->breadcrumb_2_url 		= '#';

		// Send data to view
		$this->data['pasien'] 			= $this->chat->getPasien();
		$this->data['pas'] 				= $q;
		$this->data['last_chat'] 		= $last_chat;


		$this->render();
	}


	public function send_message_user()
	{
		/**
		 * APP_KEY Pusher liblary
		 * 
		 * 
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * key = "711b19f530583c9309c4"
		 * secret = "17e4f3883c8bd2a7afc9"
		 * cluster = "ap1"
		 *
		 *
		 *
		 **/

		require_once APPPATH . 'libraries/pusher/autoload.php';

		$options 						= array(
			'cluster' 	=> 'ap1',
			'useTLS' 	=> true
		);

		$pusher 						= new Pusher\Pusher(
			'711b19f530583c9309c4',
			'17e4f3883c8bd2a7afc9',
			'1010754',
			$options
		);



		$id 							= $this->input->post('doc');
		$message 						= $this->input->post('message');

		$exe 							= $this->chat->sendMessageUser($message, $id);

		// Triger websocket
		$data['message'] 				= 'success';
		$data['data'] 					= $this->session->userdata('data')['nama'] . '|' . $message;
		$data['id'] 					= $this->session->userdata('data')['id'];
		$data['id_tujuan'] 				= $id;

		$pusher->trigger('chat', 'send-message', $data);

		$this->output_json(1);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('chatModel', 'chat');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Chat.php */
/* Location: ./application/controllers/Chat.php */