<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function upload()
	{
		if (!$this->input->is_ajax_request()) {
			// devolver error en en ajax
			return false;
		}

		$images = array();
		$error = array();
		$data = array();
		$files = $_FILES;
		$inputs = $this->input->post();

		// TODO: hacer las validaciones del caso



		// implementar la subida de los archivos y el guardado

		if ($files && $files['file']['name'] && sizeof($files['file']['name']) > 0) :

			$total_images = sizeof($files['file']['name']);

			$i = 0;

			while ($i < $total_images) :
				$_FILES['image_' . $i . ''] = array(
					'name' => $files['file']['name'][$i],
					'type' => $files['file']['type'][$i],
					'tmp_name' => $files['file']['tmp_name'][$i],
					'error' => $files['file']['error'][$i],
					'size' => $files['file']['size'][$i]
				);

				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
				$config['file_name'] = $_FILES['image_' . $i . '']['name'];
				/*
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				*/

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image_' . $i . '')) {
					$error[] = $this->upload->display_errors();
				} else {
					$data[] = $this->upload->data();
				}

				$i++;
			endwhile;

		endif;

		/*
		if (sizeof($_FILES['images']) == 0) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(301)
				->set_output(json_encode(array('status' => 301, 'mensaje' => 'No existen imagenes')));

			exit();
		}
*/
		// responser a la vista

		if ($error) :
			$this->output
				->set_content_type('application/json')
				->set_status_header(301, json_encode(array('status' => 301, 'error' => $error)));
			exit();
		endif;


		$this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(array('status' => 200, 'msg' => 'Todo Ok', 'data' => $data)));
	}
}
