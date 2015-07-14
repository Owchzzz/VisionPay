<?
class Test extends CI_Controller {
    
    public function index(){
        $this->load->view('test1');
    }
    
    public function test2(){
        $this->load->view('test2');
    }
    
    public function test3(){
        $this->load->view('test3');
    }
    public function okpaysuccess(){
        $this->load->model('testmodel');
        $this->testmodel->processsuccess();
        $this->load->view('okpay-success');
    }
    
    public function okpayfailure(){
        $this->load->model('testmodel');
        $this->testmodel->processfailure();
        $this->load->view('okpay-failure');
    }
}