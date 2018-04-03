<?php
   class User_model extends CI_Model {
      public function register() {
         $data = array(
            'name' => $this->input->post('name'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
         );
         return $this->db->insert('users', $data);
      }

      public function check_username_exists($username) {
         $query = $this->db->get_where('users', array('username' => $username));
         if(empty($query->row_array())) {
            return true;
         } else {
            false;
         }
      }

      public function check_email_exists($email) {
         $query = $this->db->get_where('users', array('email' => $email));
         if(empty($query->row_array())) {
            return true;
         } else {
            false;
         }
      }

      public function login($username, $password) {
         $result = $this->db->get_where('users', array('username' => $username));

         if($result->num_rows() == 1) {
            if(password_verify($password, $result->row()->password)) {
               return $result->row()->id;      
            } else {
               return false;
            }
         } else {
            return false;
         }
      }
   }