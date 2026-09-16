<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getFilteredData($year, $month)
	{
		$sql = 'SELECT * FROM posts WHERE YEAR(created_at) = ? AND MONTH(created_at) =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month));
		return $query->result();
	}
      public function createPost($text, $group, $fileName, $fileUrl)
    {
        $data = [
            "text" => $text,
            "recipient_group" => $group,
            "file" => $fileName,        // ✅ IMPORTANT (missing tha)
            "url" => $fileUrl,
            "created_at" => date("Y-m-d H:i:s")
        ];

        return $this->db->insert('posts', $data);
    }

}