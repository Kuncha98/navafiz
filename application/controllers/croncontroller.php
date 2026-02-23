<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CronController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Job_Model');
        $this->table_name = TABLE_PREFIX.'jobs';
        
        // Set timezone
        date_default_timezone_set('Asia/Dubai');
    }
    
    public function deleteOldJobs() {
    // Debug message to confirm function execution
    echo "deleteOldJobs function is running.<br>";

    // 90 days ago timestamp
    $ninetyDaysAgo = time() - (90 * 24 * 60 * 60);
    echo "Timestamp for 90 days ago: " . $ninetyDaysAgo . "<br>";

    // Find jobs older than 90 days
    $this->db->where('j_add_date <', $ninetyDaysAgo);
    $query = $this->db->get($this->table_name);
    echo "Found " . $query->num_rows() . " jobs older than 90 days.<br>";

    // Attempt to delete jobs older than 90 days
    if ($query->num_rows() > 0) {
        $this->db->where('j_add_date <', $ninetyDaysAgo);
        if ($this->db->delete($this->table_name)) {
            echo "Old jobs deleted successfully.<br>";
        } else {
            echo "Failed to delete old jobs.<br>";
        }
    } else {
        echo "No jobs older than 90 days found.<br>";
    }
}

}
