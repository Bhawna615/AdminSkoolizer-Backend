<?php
class Librarian extends CI_Controller{
	function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Lib');
        $this->load->library('session');
        if (isset($_SESSION['ID'])) {
			$id=$_SESSION['ID'];
		}
		else
		{
			redirect(site_url('home'));
		}
	}
	function index()
	{
		if (isset($_SESSION['ID'])) {
			$id=$_SESSION['ID'];
		}
		$data['result']=$this->Lib->profile($id);
		$data['overduebooks']=$this->Lib->getoverduebooks();
		$this->load->view('Librarian/home',$data);
	}
	
	function signout()
	{
		session_destroy();
		redirect(site_url('home'));
	}

	function issuebook()
	{
		$_SESSION['issue']="SET";
		$this->load->view('librarian/issuebook');
	}

	function searchstudent($class,$roll)
	{
		$data['student']=$this->Lib->findstudent($class,$roll);
		$this->load->view('librarian/showstudent',$data);
	}

	function issue()
	{
		if (isset($_SESSION['issue'])) {
		if (!empty($this->input->post('bid'))) {
			$date=date('Y-m-d');
			$duedate=date('Y-m-d', strtotime($date. ' + 15 days'));
			$borrower = array('BorrowerId' => $this->input->post('bid'),
		'AccessionNo'=> $this->input->post('accno'),
		'Title'=>$this->input->post('title'),
		'IssueDate'=> date('Y-m-d'),
		'DueDate'=>$duedate);
			$this->Lib->registerbook($borrower);
			$this->issuedbook();
			unset($_SESSION['issue']);
		}
		else
		{
			echo "Please Enter Borrower Id first";
		}
	}
	else
	{
		redirect(site_url('librarian/index'));
	}
		
	}

	function issuedbook()
	{
		$data['books']=$this->Lib->loadissuedbooks();
		$this->load->view('librarian/issuedbooks',$data);
	}

	function studentdetailform()
	{
		$this->load->view('librarian/searchstudent');
	}

	function searchborrower($class,$roll)
	{
		$data['borrower']=$this->Lib->findborrower($class,$roll);
		$this->load->view('librarian/borrowedbooks',$data);
	}

	function addbookform()
	{
		$_SESSION['newbook']="set";
		$this->load->view('librarian/addbookform');
	}

	function addbook()
	{
		if (isset($_SESSION['newbook'])) {
		 		$config['upload_path']          = './assets/images/books/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['max_width']            = 2000;
                $config['max_height']           = 2500;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo "File size is larger than specified";
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                      $img=$data['upload_data']['file_name'];
                }

         $book = array('title' =>$this->input->post('title') ,
		'author' => $this->input->post('author'),
		'units' => $this->input->post('units'),
		'isbn' => $this->input->post('isbn'),
		'publisher' => $this->input->post('publisher'),
		'pages' => $this->input->post('pages'),
		'edition' => $this->input->post('edition'),
		'description' => $this->input->post('desciption'),
		'image' => $img );
		$this->Lib->insertbook($book);
		$this->showbook();
		unset($_SESSION['newbook']);
		}
		else
		{
			redirect(site_url('librarian'));
		}
	}

	function showbook()
	{
		$data['books']=$this->Lib->getbooks();
		$this->load->view('librarian/showbooks',$data);
	}

	function returnbook($transactionid)
	{
		$this->Lib->markreturn($transactionid);
		redirect(site_url('librarian/issuedbook'));
	}

	function settings()
    {
        $id=$_SESSION['ID'];
        $data['settings']=$this->Lib->profile($id);
        $this->load->view('librarian/settings/settings',$data);
    }

    function changepassword()
    {
        $id=$_SESSION['ID'];
        $data['password']=$this->Lib->profile($id);
        $this->load->view('librarian/settings/changepassword',$data);
    }

    function updatepassword()
    {
        $old=$this->input->post('old');
        $new=password_hash($this->input->post('new'), PASSWORD_BCRYPT);
        $id=$_SESSION['ID'];
        $data['password']=$this->Lib->profile($id);
        foreach ($data['password'] as $row) {
            if (password_verify($old, $row->Password)) {
                $this->Lib->updateuserpassword($id,$new);
               $this->load->view('alerts/updatepassword');
            }
            else
            {
                $this->load->view('alerts/failed'); 
            }
        }
    }

    function changeimage()
    {
        $this->load->view('librarian/settings/changeimage');
    }

    function uploadimage()
    {
        $id=$_SESSION['ID'];
                $config['upload_path']          = './assets/images/librarian/';
                $config['allowed_types']        = 'gif|jpeg|png|jpg';
                $config['max_size']             = 500;
                $config['max_width']            = 2000;
                $config['max_height']           = 2500;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                      $img=$data['upload_data']['file_name'];
                      $this->Lib->uploadimage($id,$img);
                redirect('Librarian/settings');
                }
                
    }

    function messages()
    {
        $data['messages']=$this->Lib->loadmessages();
        $this->load->view('librarian/messages',$data);
    }

}
?>