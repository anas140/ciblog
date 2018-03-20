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
			$data['title'] = 'Create Post';
			
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');			
		}
	}