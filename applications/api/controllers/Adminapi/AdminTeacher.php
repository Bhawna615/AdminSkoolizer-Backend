<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTeacher extends CI_Controller {

    public function __construct()
{
    parent::__construct();

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        exit(0);
    }

        header('Content-Type: application/json');

        $this->load->model('Adminapi/AdminTeacherModel');
        $this->load->model('Adminapi/AdminAttendanceModel');

        $this->output->enable_profiler(FALSE);
    }

    /*
    =============================
    GET ALL TEACHERS
    =============================
    */
    public function getTeachers()
    {
        $teachers = $this->db->get('teachers')->result();

        echo json_encode($teachers);
    }


    /*
    =============================
    GET ALL CLASSES
    =============================
    */
    public function getClasses()
    {
        $classes = $this->db->get('classes')->result();

        echo json_encode($classes);
    }



    /*
    =============================
    INSERT TEACHER
    =============================
    */
    public function insertTeacher()
    {

        $img = null;

        if (!empty($_FILES['image']['name'])) {

            $config['upload_path']   = './assets/images/teachers/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $uploadData = $this->upload->data();
                $img = $uploadData['file_name'];

            }
        }


        $data = array(

            "Teachername" => $this->input->post("name"),
            "Post"        => $this->input->post("post"),
            "Contact"     => $this->input->post("contact"),
            "Classteacher"=> $this->input->post("class"),
            "Email"       => $this->input->post("email"),
            "Dob"         => $this->input->post("dob"),
            "Doj"         => $this->input->post("doj"),
            "image"       => $img

        );


        $insert = $this->db->insert("teachers", $data);


        if($insert){

            echo json_encode([
                "status" => "success",
                "message" => "Teacher added successfully"
            ]);

        }else{

            echo json_encode([
                "status" => "error",
                "message" => "Failed to add teacher"
            ]);

        }

    }



    /*
    =============================
    DELETE TEACHER
    =============================
    */
    public function deleteTeacher($id)
    {

        $this->db->where("id",$id);
        $delete = $this->db->delete("teachers");


        if($delete){

            echo json_encode([
                "status"=>"success"
            ]);

        }else{

            echo json_encode([
                "status"=>"error"
            ]);

        }

    }
public function getTeacher($id)
{
    $teacher = $this->AdminTeacherModel->get($id);

    if($teacher){
        echo json_encode($teacher);
    }else{
        echo json_encode([
            "status" => "error",
            "message" => "Teacher not found"
        ]);
    }
}
public function addToFormer()
{
    $id = $this->input->post('id');
    $date_of_leaving = $this->input->post('date_of_leaving');

    if(!$id || !$date_of_leaving){
        echo json_encode([
            "status" => "error",
            "message" => "Missing fields"
        ]);
        return;
    }

    $teacher = $this->AdminTeacherModel->get($id);

    if(!$teacher){
        echo json_encode([
            "status" => "error",
            "message" => "Teacher not found"
        ]);
        return;
    }

    $insert = $this->AdminTeacherModel->insertToFormer($teacher,$date_of_leaving);

    if($insert){

        $this->db->where('id',$id);
        $this->db->delete('teachers');

        echo json_encode([
            "status"=>"success"
        ]);

    }else{

        echo json_encode([
            "status"=>"error",
            "message"=>"Failed to Update"
        ]);

    }
}
public function formerTeachers()
{
    $data = $this->db->get("former_teachers")->result();

    echo json_encode($data);
}
// GET ALL EXPERIENCE CERTIFICATES
public function getExperienceCertificates()
{
    $certificates = $this->AdminTeacherModel->getAllExperienceCertificates();

    echo json_encode([
        "status" => true,
        "data" => $certificates
    ]);
}


// GENERATE EXPERIENCE CERTIFICATE
public function generateExperienceCertificate()
{
    $id = $this->input->post('id');
    $teacher = $this->AdminTeacherModel->get($id);

    if(!$teacher){
        echo json_encode(["status"=>false,"message"=>"Teacher not found"]);
        return;
    }

    $dob = (!empty($teacher->Dob) && $teacher->Dob != '0000-00-00')
        ? $teacher->Dob
        : date('Y-m-d');

    $doj = (!empty($teacher->Doj) && $teacher->Doj != '0000-00-00')
        ? $teacher->Doj
        : date('Y-m-d');

    $data = [
        'name' => $teacher->Teachername,
        'designation' => $teacher->Post,
        'date_of_birth' => $dob,
        'date_of_joining' => $doj,
        'from_date' => $this->input->post('from_date'),
        'to_date' => $this->input->post('to_date'),
        'classes_taught' => $this->input->post('classes_taught'),
        'created_at' => date('Y-m-d H:i:s')
    ];

    if($this->AdminTeacherModel->insertExperienceCertificate($data)){
        echo json_encode(["status"=>true,"message"=>"Certificate Generated"]);
    }else{
        echo json_encode(["status"=>false,"message"=>"Failed"]);
    }
}


// GET SINGLE CERTIFICATE
public function getExperienceCertificate($id)
{
    $certificate = $this->AdminTeacherModel->getExperienceCertificate($id);

    echo json_encode([
        "status" => true,
        "data" => $certificate
    ]);
}

  public function profile($id)
    {
        $teacher = $this->AdminTeacherModel->Teacherprofile($id);

        echo json_encode([
            "status" => true,
            "data" => $teacher
        ]);
    }

    // DELETE TEACHER
    public function delete($id)
    {
        $delete = $this->AdminTeacherModel->delete($id);

        if($delete){
            echo json_encode([
                "status" => true,
                "message" => "Deleted Successfully"
            ]);
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Delete Failed"
            ]);
        }
    }
    // GET SINGLE TEACHER
public function getTeacherById($id)
{
    $teacher = $this->AdminTeacherModel->profile($id);

    echo json_encode([
        "status" => "success",
        "data" => $teacher
    ]);
}

// UPDATE TEACHER
public function updateTeacher()
{
    $id = $this->input->post('id');

    $data = array(
        'Teachername' => $this->input->post('name'),
        'Post' => $this->input->post('post'),
        'Contact' => $this->input->post('contact'),
        'Classteacher' => $this->input->post('class'),
        'Dob' => $this->input->post('dob'),
        'Doj' => $this->input->post('doj'),
        'Email' => $this->input->post('email'),
    );

    // IMAGE UPLOAD
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $config['upload_path'] = './assets/images/teachers/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){

            $uploadData = $this->upload->data();

            $data['image'] = $uploadData['file_name'];
        }
    }

    $update = $this->AdminTeacherModel->update($data, $id);

    if($update){
        echo json_encode([
            "status" => "success",
            "message" => "Teacher Updated Successfully"
        ]);
    }else{
        echo json_encode([
            "status" => "error",
            "message" => "Update Failed"
        ]);
    }
}
public function generateCredentials($id)
{
    $this->load->model('Adminapi/AdminTeacherModel');

    $teacher = $this->AdminTeacherModel->get($id);

    if($teacher){

        echo json_encode([
            "status" => "success",
            "id" => $id,
            "teacher" => $teacher
        ]);

    }else{

        echo json_encode([
            "status" => "error",
            "message" => "Teacher not found"
        ]);

    }
}
public function storeTeacherCredentials()
{
    $teacherId = $this->input->post('id');

    $credentials = array(
        'Email' => $this->input->post('email'),
        'Password' => password_hash(
            $this->input->post('password'),
            PASSWORD_BCRYPT
        )
    );

    if($this->AdminTeacherModel->updateTeacherCredentials($credentials, $teacherId)) {

        echo json_encode([
            "status" => "success",
            "message" => "Credentials generated successfully"
        ]);

    } else {

        echo json_encode([
            "status" => "error",
            "message" => "Failed to generate credentials"
        ]);

    }
}

}

