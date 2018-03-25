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
         $data['title'] = 'Create Category';
         $this->form_validation->set_rules('name', 'Name', 'required');
         if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
         } else {
            $this->category_model->create_category();
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