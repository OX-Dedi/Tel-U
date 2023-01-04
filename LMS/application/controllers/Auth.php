<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Front');
        $this->get_datasetupapp = $this->M_Front->fetchsetupapp();
    }

    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect(base_url());
        }
        $validation = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|xss_clean',
                'errors' => ['required' => 'You must provide a %s.', 'xss_clean' => 'Please check your form on %s.']
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|xss_clean',
                'errors' => ['required' => 'You must provide a %s.', 'xss_clean' => 'Please check your form on %s.']
            ]
        ];
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login LMS',
                'dataapp' => $this->get_datasetupapp
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('layout/footer', $data);
        } else {
            //validasi sukses
            $this->M_Auth->do_login();
        }
    }

        
        //AUTH E-LEARNING
        public function masuk(){
            unset($_SESSION["session_user_id"]);
            unset($_SESSION["session_user_name"]);
            session_destroy();
        
            $data['title'] = "Signup/Login";
        
            $this->load->view('elearn/login.php', $data);
        }
        
    
        public function logout_elearn(){
            unset($_SESSION["session_user_id"]);
            unset($_SESSION["session_user_name"]);
            session_destroy();
    
            redirect('/');
        }

        public function signup(){
            $data['title'] = "Signup/Login";
            $this->load->view('signup.php', $data);
        }

        public function check_e(){
            $this->form_validation->set_rules('loginemail', 'loginemail', 'required');
            $this->form_validation->set_rules('loginpassword', 'loginpassword', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $data["is_error"] = "true";
                $data['message'] = "Failed to login due to invalid input.";
                echo json_encode($data);
                die;
            } else {        
    
                $email = $this->input->post('loginemail');
                $user_given_password = $this->input->post('loginpassword');
    
                $email = @trim($email);
                $user_given_password = @trim($user_given_password);
    
                $email = htmlspecialchars($email, ENT_QUOTES);
                $user_given_password = htmlspecialchars($user_given_password, ENT_QUOTES);
                
                $this->db->select('id');
                $this->db->where('email', $email);
                $this->db->where('status', 1);
                $this->db->from('app_user');
                $count_existing_user = $this->db->count_all_results();
                if($count_existing_user == 0){
                    $data["is_error"] = "true";
                    $data['message'] = 'Email is not registered.';
                    echo json_encode($data);
                    die;
                }
    
                $this->db->select('id, user_password, full_name, is_admin');
                $this->db->from('app_user');
                $this->db->where('email', $email);
                $result = $this->db->get();
    
                $id = $result->row()->id;
                $is_admin = $result->row()->is_admin;
                $full_name = $result->row()->full_name;
                $user_password = $result->row()->user_password;
    
                $user_password = $this->encryption->decrypt($user_password);
    
                if($user_given_password != $user_password){
                    $data["is_error"] = "true";
                    $data['message'] = 'Wrong credentials. Try again.';
                    echo json_encode($data);
                    die;
                }
                
                if(!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION["session_user_id"] = $id;
                $_SESSION["session_user_name"] = $full_name;        
                $_SESSION["session_user_is_admin"] = $is_admin;
    
                $data["is_error"] = "false";
                $data["message"] = "Authentication success. Please wait ...";            	        
                echo json_encode($data);
            }    
        }
}
