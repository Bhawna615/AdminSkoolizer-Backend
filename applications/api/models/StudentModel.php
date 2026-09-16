<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /** 🔹 Get student by ID */
    public function get($id)
    {
        return $this->db->where('id', $id)->get('student')->row();
    }

    /** 🔹 Messages Notification */
    public function loadRecentMessages($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->message_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('sent_at >', $checkedAt);
        $this->db->where('student_id', $studentId);
        return $this->db->get('messages')->num_rows();
    }

    public function updateMessageCheckTime($studentId)
    {
        $this->db->set('message_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Assignments Notification */
    public function loadRecentAssignments($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->assignment_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('Class', $studentClass);
        return $this->db->get('assignment')->num_rows();
    }

    public function updateAssignmentCheckTime($studentId)
    {
        $this->db->set('assignment_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Exams Notification */
    public function loadRecentExams($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->exam_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('Class', $studentClass);
        return $this->db->get('conduct')->num_rows();
    }

    public function updateExamCheckTime($studentId)
    {
        $this->db->set('exam_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 School Posts Notification */
    public function loadRecentSchoolPosts($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->school_post_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('recipient_group', 'school');
        return $this->db->get('posts')->num_rows();
    }

    public function updateSchoolPostCheckTime($studentId)
    {
        $this->db->set('school_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Class Posts Notification */
    public function loadRecentClassPosts($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->class_post_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('recipient_group', $studentClass);
        return $this->db->get('posts')->num_rows();
    }

    public function updateClassPostCheckTime($studentId)
    {
        $this->db->set('class_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Events Notification */
    public function loadRecentEvents($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->event_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        return $this->db->get('events')->num_rows();
    }

    public function updateEventCheckTime($studentId)
    {
        $this->db->set('event_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Fee Notification */
    public function loadRecentPayments($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->fee_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('student_id', $studentId);
        return $this->db->get('fee')->num_rows();
    }

    public function updateFeeCheckTime($studentId)
    {
        $this->db->set('fee_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Mark notification type as read */
    public function markNotificationAsRead($studentId, $type)
    {
        $fieldMap = [
            'messages' => 'message_checked_at',
            'assignments' => 'assignment_checked_at',
            'exams' => 'exam_checked_at',
            'schoolPosts' => 'school_post_checked_at',
            'classPosts' => 'class_post_checked_at',
            'events' => 'event_checked_at',
            'payments' => 'fee_checked_at'
        ];

        if (!isset($fieldMap[$type])) return false;

        $this->db->set($fieldMap[$type], date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        return $this->db->update('student');
    }

    public function updateFcmToken($id, $token)
{
    $this->db->where('id', $id);
    return $this->db->update('student', ['fcm_token' => $token]);
}


 // ✅ Fetch all linked accounts for a student
    public function getAccounts($studentId)
    {
        $sql = "SELECT s.* FROM student_accounts sa
                JOIN student s ON sa.other_student_id = s.id
                WHERE sa.student_id = ?";
        return $this->db->query($sql, [$studentId])->result();
    }

    // ✅ Add new linked account (mutual linking)

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

    // ✅ Helper: insert relationship only if it doesn’t exist
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

    // ✅ Check if account is already linked
    public function notAlreadyAdded($currentStudentId, $studentAccountId)
    {
        $exists = $this->db->where('student_id', $currentStudentId)
                           ->where('other_student_id', $studentAccountId)
                           ->get('student_accounts')
                           ->row();
        return !$exists;
    }

    // ✅ Remove linked account (mutual removal)
    public function removeStudentAccount($currentStudentId, $otherStudentId)
    {
        $this->db->where('student_id', $currentStudentId)
                 ->where('other_student_id', $otherStudentId)
                 ->delete('student_accounts');

        $this->db->where('student_id', $otherStudentId)
                 ->where('other_student_id', $currentStudentId)
                 ->delete('student_accounts');

        return true;
    }

    // ✅ Authenticate student for linking account
   public function userLogin($adm, $password)
{
    // Your column names:
    // table: student
    // admission column: Admno
    // password column: Password

    $student = $this->db->where('Admno', $adm)->get('student')->row();

    if ($student && password_verify($password, $student->Password)) {
        return $student;   // return full student row
    }

    return false;
}



}


