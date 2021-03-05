<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		 $this->load->view('index');
	}
    /***
    *@function name:dashboard
    *@author : nihala n
    *@date : 04/03/2021
    ***/
	public function dashboard()
		{
			$this->load->view('dashboard');
		}
	public function view_user()
		{
	 		$this->load->view('viewstudents');
		}
	public function notification()
		{
	 		$this->load->view('notification');
		}
	public function view_complaints()
		{
	 		$this->load->view('view_complaints');
		}
	public function logout()
		{
	 		$this->load->view('');
		}


		 /***
    *@function name:Add user
    *@author : Mahima s
    *@date : 04/03/2021
    ***/
    public function user()
    {
        $this->load->view('add_user');
    }
    public function adduser()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("firstname","firstname",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $b=array("firstname"=>$this->input->post("firstname"),"email"=>$this->input->post("email"),"password"=>$this->input->post("password"),
                "usertype"=>'1');
        $this->mainmodel->inreg($b);    
        redirect(base_url().'main/dashboard');
        }
    }
        else
        {
            redirect(base_url().'main/login');
        }
}
/***
    *@function name: company page
    *@author : Nihala N
    *@date : 04/03/2021
    ***/
public function company()
    {
        $this->load->view('add_company');
    }
    /***
    *@function name:Add company
    *@author : Mahima s
    *@date : 04/03/2021
    ***/
    public function addcompany()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("firstname","firstname",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $a=array("firstname"=>$this->input->post("firstname"),"email"=>$this->input->post("email"),"password"=>$this->input->post("password"),
                "usertype"=>'2');
        $this->mainmodel->inregs($a);    
        redirect(base_url().'main/dashboard');
        }
    }
    else
    {
        redirect(base_url().'main/login');
    }
}
/***
    *@function name: Add interview details
    *@author : Mahima s
    *@date : 04/03/2021
    ***/
public function add_interview()
    {
        $this->load->view('addidetails');
    }
    public function addinterview()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("cname","company",'required');
        $this->form_validation->set_rules("date","date",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("qlfctn","qualification",'required');
        $this->form_validation->set_rules("batch","batch",'required');
        $this->form_validation->set_rules("experience","experience",'required');
        $this->form_validation->set_rules("salary","salary",'required');
        $this->form_validation->set_rules("location","location",'required');
        $this->form_validation->set_rules("lastdate","lastdate",'required');
        $this->form_validation->set_rules("venue","venue",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $b=array("company"=>$this->input->post("cname"),
            "date"=>$this->input->post("date"),
            "qualification"=>$this->input->post("qlfctn"),
            "batch"=>$this->input->post("batch"),
            "experience"=>$this->input->post("experience"),
            "salary"=>$this->input->post("salary"),
            "jlocation"=>$this->input->post("location"),
            "ldate"=>$this->input->post("lastdate"),
            "vlocation"=>$this->input->post("venue"), );
        $this->mainmodel->ireg($b);    
        redirect(base_url().'main/dashboard');
        }
    }
    
    else
    {
        redirect(base_url().'main/login');
    }
}
    /***
    *@function name:login
    *@author : Mahima s
    *@date : 04/03/2021
    ***/
    public function login()
    {
        $this->load->view('login');
    }
   
    public function logns()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
            $this->load->model('mainmodel');
            $email=$this->input->post("email");
            $pass=$this->input->post("password");
            $rslt=$this->mainmodel->selectpass($email,$pass);
                if ($rslt)
                 {
                    $id=$this->mainmodel->getuserid($email);

                    $user=$this->mainmodel->getuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array
                        ('id'=>(int)$user->id,
                        'usertype'=>$user->usertype,'status'=>$user->status,'logged_in'=>(bool)true));
                    if($_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
                    {
                        redirect(base_url().'main/dashboard');
                    }
                    elseif($_SESSION['usertype']=='0'&& $_SESSION['logged_in']==true )
                    {
                        redirect(base_url().'main/dashboard');
                    }
                    elseif($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true )
                    {
                        redirect(base_url().'main/student_view');
                    }
                    else
                    {
                        echo "Waiting for approval";
                    }
                 }
                 else
                 {
                    echo "invalid user";
                 }
             }
             else
             {
                redirect('main/login','refresh');
             }
                 
}
/***
    *@function name:view student details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/

    public function student_view()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewstudent();
        $this->load->view('view_stud',$data);
    }
    else
    {
        redirect(base_url().'main/login');
    }
    }
    /***
    *@function name:view qualification details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
    public function qualification()
    {       
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewqualification();
        $this->load->view('qualification',$data);
    }
    else
    {
        redirect(base_url().'main/login');
    }
    }
    /***
    *@function name:view project details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
    public function project()
    {
        
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewproject();
        $this->load->view('project',$data);
    }
    /***
    *@function name:view paper details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
    public function paper()
    {
        
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewpaper();
        $this->load->view('paper',$data);
    }

    

    }

