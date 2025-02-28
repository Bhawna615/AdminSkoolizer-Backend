<?php


class StudentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id)
    {
        return
            $this->db->where('id', $id)
            ->get('student')->row();
    }

    public function getMarks($subject, $class, $rollno)
    {
        $sql = 'SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND conduct.Subject=? AND conduct.Class=? AND exam.Rollno=? ORDER BY conduct.Date desc';
        $query = $this->db->query($sql, array($subject, $class, $rollno));
        $row = $query->result();
        return $row;
    }

    function getResults($code, $roll)
    {
        $sql='SELECT * FROM exam WHERE Examcode=? AND Rollno=?';
        $query=$this->db->query($sql,array($code, $roll));
        $result=$query->result();
        return $result;
    }
    
    public function getMessageCount($studentId)
    {
        return $this->db->where('student_id', $studentId)->get('messages')->num_rows();
    }
    

    
    public function loadRecentMessages($studentId) {
        $student = $this->get($studentId);
        $checkedAt = $student->notification_checked_at ?? '2000-01-01 00:00:00'; // ✅ NULL handle
    
        $this->db->where('sent_at >', $checkedAt);
        $this->db->where('student_id', $studentId);
        
        return $this->db->get('messages')->num_rows();
    }
    
    
    public function updateNotificationCheckTime($studentId)
    {
        $this->db->set('notification_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
    public function loadRecentPayments($studentId)
    {
        $student = $this->get($studentId);
        $this->db->where('created_at >', $student->fee_checked_at);
        $this->db->where('student_id', $studentId);
        return $this->db->get('fee')->num_rows();
    }
    
     public function updateFeeNotificationCheckTime($studentId)
    {
        $this->db->set('fee_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
    public function loadRecentEvents($studentId)
    {
         $student = $this->get($studentId);
        $this->db->where('created_at >', $student->event_checked_at);
        return $this->db->get('events')->num_rows();
    }
    
    public function updateEventNotificationCheckTime($studentId)
    {
        $this->db->set('event_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
    public function loadRecentClassPosts($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $this->db->where('created_at >', $student->class_post_checked_at);
        $this->db->where('recipient_group', $studentClass);
        return $this->db->get('posts')->num_rows();
    }
    
    public function updateClassPostNotificationCheckTime($studentId)
    {
        $this->db->set('class_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
     public function loadRecentSchoolPosts($studentId)
    {
        $student = $this->get($studentId);
        $this->db->where('created_at >', $student->school_post_checked_at);
        $this->db->where('recipient_group', 'school');
        return $this->db->get('posts')->num_rows();
    }
    
     public function updateSchoolPostNotificationCheckTime($studentId)
    {
        $this->db->set('school_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
     public function loadRecentExams($studentId, $studentClass)
    {
         $student = $this->get($studentId);
        $this->db->where('created_at >', $student->exam_checked_at);
        $this->db->where('Class', $studentClass);
        return $this->db->get('conduct')->num_rows();
    }
    
    public function updateExamNotificationCheckTime($studentId)
    {
        $this->db->set('exam_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
     public function loadRecentAssignments($studentId, $studentClass)
    {
         $student = $this->get($studentId);
        $this->db->where('created_at >', $student->assignment_checked_at);
        $this->db->where('Class', $studentClass);
        return $this->db->get('assignment')->num_rows();
    }
    
     public function updateAssignmentNotificationCheckTime($studentId)
    {
        $this->db->set('assignment_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }
    
    public function updatePassword($updatedPassword, $studentId)
    {
        $this->db->set('Password', $updatedPassword);
        $this->db->where('id', $studentId);
        return $this->db->update('student');
    }

    public function getAccounts($studentId)
    {
        $sql = 'SELECT * FROM student,student_accounts WHERE student_accounts.other_student_id = student.id AND student_accounts.student_id = ?';
        $query = $this->db->query($sql, $studentId);
        return $query->result();
    }

    // ✅ Function to Check Before Inserting to Avoid Duplicates
    private function insertIfNotExists($studentId, $otherStudentId)
    {
        $exists = $this->db->where('student_id', $studentId)
                           ->where('other_student_id', $otherStudentId)
                           ->get('student_accounts')
                           ->row();

        if (!$exists) {
            $this->db->insert('student_accounts', [
                'student_id' => $studentId,
                'other_student_id' => $otherStudentId
            ]);
        }
    }

    // ✅ Updated Insert Function to Prevent Duplicates
    public function insertStudentAccount($currentStudentId, $studentAccount)
    {
        $accounts = $this->db->where('student_id', $currentStudentId)->get('student_accounts')->result();

        foreach ($accounts as $account) {
            $this->insertIfNotExists($account->other_student_id, $studentAccount->id);
            $this->insertIfNotExists($studentAccount->id, $account->other_student_id);
        }

        $this->insertIfNotExists($currentStudentId, $studentAccount->id);
        $this->insertIfNotExists($studentAccount->id, $currentStudentId);
    }

    // ✅ Function to Check if Account is Already Added
    public function notAlreadyAdded($currentStudentId, $studentAccount)
    {
        $exists = $this->db->where('student_id', $currentStudentId)
                           ->where('other_student_id', $studentAccount->id)
                           ->get('student_accounts')
                           ->row();
        
        return !$exists;
    }


    // public function notAlreadyAdded($currentStudentId, $studentAccount)
    // {
    //     $this->db->where('student_id', $currentStudentId);
    //     $this->db->where('other_student_id', $studentAccount->id);
    //     if($this->db->get('student_accounts')->num_rows() <= 0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function removeStudentAccount($currentStudentId, $otherStudentId)
    {
        $this->db->where('student_id', $currentStudentId);
        $this->db->where('other_student_id', $otherStudentId);
        if($this->db->delete('student_accounts')) {
            $this->db->where('student_id', $otherStudentId);
            $this->db->where('other_student_id', $currentStudentId);
            $this->db->delete('student_accounts');
            return true;
        } else {
            return false;
        }
    }


    public function getInfo($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('student'); // Assuming you have a 'students' table
        return $query->row(); // Return a single row
    }

    public function getInfoById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('student'); // Assuming you have a 'students' table
        return $query->row(); // Return a single row
    }

    public function getCreateAccounts($studentId){
        $this->db->where('id', $studentId);
        $query = $this->db->get('student');
        return $query->row();
    }
    
}