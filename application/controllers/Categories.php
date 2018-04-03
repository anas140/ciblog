<?php 
   class Categories extends CI_Controller {
      public function index() {
         $data['title'] = 'Categories';
         $data['categories'] = $this->category_model->getCategories();
         $this->load->view('templates/header');
         $this->load->view('categories/index', $data);
         $this->load->view('templates/footer');
      }
      public function create() {
         # check if a user logged in
         if(!$this->session->userdata('logged_in')) {
            redirect('users/login');
         }
         
         $data['title'] = 'Create Category';
         $this->form_validation->set_rules('name', 'Name', 'required');
         if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
         } else {
            $this->category_model->create_category();
            $this->session->set_flashdata('category_created', 'Your Category has been created');
            redirect('categories');
         }
      }

      public function posts($id) {
         $data['title'] = $this->category_model->getCategory($id)->name;
         $data['posts'] = $this->post_model->getPostsByCategory($id);
         $this->load->view('templates/header');
         $this->load->view('posts/index', $data);
         $this->load->view('templates/footer');
      }
   }