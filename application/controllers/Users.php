<?php
   class Users extends CI_Controller {
      public function register() {
         $data['title'] = "Sign Up";

         $this->form_validation->set_rules('name', 'Name', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
         $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
         $this->form_validation->set_rules('password', 'Password', 'required');
         $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

         if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/register', $data);
            $this->load->view('templates/footer');
         } else {
            // die('user registered');
            $this->user_model->register();
            $this->session->set_flashdata('user_registered', 'You are Now registerd you can now ');
            redirect('posts');
         }
      }

      /**
       * [check_username_exists description]
       * @param  [type] $username [username passes in form request]
       * @return [bool]           [true = not exists| false = already exists]
       */
      function check_username_exists($username) {
         $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a diffrent one');
         if($this->user_model->check_username_exists($username)) {
            return true;
         } else {
            return false;
         }
      }

      function check_email_exists($email) {
         $this->form_validation->set_message('check_email_exists', 'That Email is taken. Please choose a diffrent one');
         if($this->user_model->check_email_exists($email)) {
            return true;
         } else {
            return false;
         }
      }
      // login user
      public function login() {
         // echo "login"; exit;
         $data['title'] = "Sign In";

         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');

         if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');
         } else {

            # get username
            $username =  $this->input->post('username');
            # Get and encrypt the password
            $password = $this->input->post('password');
            // $password =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            # Login and get the user id back
            $user_id = $this->user_model->login($username, $password);
            if($user_id) {
               # create session
               $user_data = array(
                  'user_id' => $user_id,
                  'username' => $username,
                  'logged_in' => true
               );
               $this->session->set_userdata($user_data);

               # set set_message
               $this->session->set_flashdata('user_loggedin', 'You are Successfully logged in ');
               redirect('posts');
            } else {
               # set error flash message and redirect to login
               $this->session->set_flashdata('login_failed', 'Login is invalid');
               redirect('users/login');
            }
            
         }
      }

      public function logout() {
         # unset user_data
         $this->session->unset_userdata('logged_in');
         $this->session->unset_userdata('user_id');
         $this->session->unset_userdata('username');

         // set message
         $this->session->set_flashdata('logged_out', 'you are now logged out');
         redirect('users/login');
      }
   }