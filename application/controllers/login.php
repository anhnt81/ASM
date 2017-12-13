<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index($msg = NULL)
    {
        $data['msg'] = $msg;
        $this->load->view('login_view',$data);
    }
    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if($result == FALSE){
            // If user did not validate, then show them login page again
            $msg = 'Invalid username and/or password.<br />';
            $this->index($msg);
        }else{
            // If user did validate,
            // Send them to members area
            redirect('home');
        }
    }
}
//class Home extends CI_Controller{
//    function __construct(){
//        parent::__construct();
//        $this->check_isvalidated();
//    }
//
//    public function index(){
//        // If the user is validated, then this function will run
//        echo 'Congratulations, you are logged in.';
//    }
//
//    private function check_isvalidated(){
//        if(! $this->session->userdata('validated')){
//            redirect('login');
//        }
//    }
//    public function do_logout(){
//        $this->session->sess_destroy();
//        redirect('login');
//    }
//}
?>