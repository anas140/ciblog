<?php
	class Posts extends CI_Controller {
		/**
		 * Show all Posts
		 * @return [type] [view index]
		 */
		public function index() {
			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts();

			// print_r($data['posts']);
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}
		
		/**
		 * Show single post based on slug uri
		 * @param  [type] $slug [post/slug]
		 * @return [type]       [vie single post]
		 */
		public function view($slug = Null) {
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);
			// print_r($data); exit;
			if(empty($data['post'])) {
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}

		/**
		 * Create new Posr
		 * @return Post Forum
		 */
		public function create() {
			# check if a user logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Create Post';
			$data['categories'] = $this->post_model->getCategories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				// upload image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|png|jpg';
				$config['max_size'] = '2048';
				$config['max_width'] = '0';
				$config['max_height'] = '0';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					$image = 'no_image.jpg';
					// print_r($errors); exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
					$image = $_FILES['userfile']['name'];
					// echo $image; exit;
				}
				$this->post_model->create_post($image);
				$this->session->set_flashdata('post_created', 'Your post has been created');
				redirect('posts');
				
			}
		}

		public function delete($id) {
			# check if a user logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->delete_post($id);
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted');
			redirect('posts');
		}

		public function edit($slug) {
			# check if a user logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			# check user
			if($this->session->userdata('user_id') != $data['post']['user_id']) {
				redirect('posts');
			}

			$data['categories'] = $this->post_model->getCategories();

			if(empty($data['post'])) {
				show_404();
			}

			$data['title'] = 'Edit Post'; 

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update() {
			# check if a user logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			$this->post_model->update_post();
			$this->session->set_flashdata('post_updated', 'Your post has been updated');
			redirect('posts');
		}
	}