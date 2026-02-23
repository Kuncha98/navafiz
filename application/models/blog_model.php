<?php
#[\AllowDynamicProperties]
class Blog_Model extends CI_Model {
    /** Utility Methods **/
    function _required($required, $data){
        foreach($required as $field)
            if(!isset($data[$field])) return false;
            
        return true;
    }
	
	function addComments($options = array())
	 	{
		$this->db->insert($this->db->dbprefix('blog_comment'),$options);
		echo $this->db->last_query();
		$id = $this->db->insert_id();
		return $id;
		}	
	function getBlogs()
		{
        //if(isset($options['status']))
          $this->db->where('blog_status', '1');   
		/* if(isset($options['position']))
            $this->db->where('position', $options['position']);   */	          
            
        $this->db->select('*');
		$this->db->from($this->db->dbprefix('blogs'));
		$this->db->join('jb_blog_category', 'jb_blogs.blog_category_id = jb_blog_category.blogc_id');
		$this->db->order_by("blog_add_date", "DESC");
		//$this->db->limit(3,0);
		$query = $this->db->get();
        // echo $this->db->last_query();
	    //exit;
         if ($query->num_rows() > 0) {                          
            if(isset($options['blog_id']))
                return $query->row(0);
            
            return $query->result();
         	}
         else
            return 'empty';
     	}	

	function getRandomTags()
		{
        $this->db->where('blog_status', '1');   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('blog_tags'));
		$this->db->join('jb_blogs', 'jb_blog_tags.blog_id = jb_blogs.blog_id');
		$this->db->order_by("blog_add_date", "DESC");
		$this->db->limit(10,0);
		$query = $this->db->get();
      // echo $this->db->last_query();
	//exit;
         if ($query->num_rows() > 0) {                          
             return $query->result();
         	}
         else
            return 'empty';
     	}	
	function getBlogComments()
		{
        $this->db->where('blogcom_status', '1');   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('blog_comment'));
		$this->db->join('jb_blogs', 'jb_blog_comment.blog_id = jb_blogs.blog_id');
		$this->db->order_by("blogcom_add_date", "DESC");
		$this->db->limit(10,0);
		$query = $this->db->get();
      // echo $this->db->last_query();
	//exit;
         if ($query->num_rows() > 0) {                          
             return $query->result();
         	}
         else
            return 'empty';
     	}	
	function getBlogDetail($options = array())
		{
			
			
	    $this->db->select('*');
		$this->db->from($this->db->dbprefix('blogs'));
		$this->db->join('jb_blog_category', 'jb_blogs.blog_category_id = jb_blog_category.blogc_id');
		$this->db->where('blog_id', $options['blog_id']);  
	    $query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            return $query->row(0);
         	}
        else
            return 'empty';
     	}
	function getCategoryBlogs($options = array())
		{
	    $this->db->select('*');
		$this->db->from($this->db->dbprefix('blogs'));
		$this->db->join('jb_blog_category', 'jb_blogs.blog_category_id = jb_blog_category.blogc_id');
		$this->db->where('blog_category_id', $options['blog_category']);  
	    $query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            return $query->result();
         }
         else
            return 'empty';
     	}
	function getRecentPosts()
		{
        $this->db->where('blog_status', '1');   
		$this->db->select('*');
		$this->db->from($this->db->dbprefix('blogs'));
		$this->db->join('jb_blog_category', 'jb_blogs.blog_category_id = jb_blog_category.blogc_id');
		$this->db->order_by("blog_add_date", "DESC");
		$this->db->limit(4,0);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            if(isset($options['c_id']))
                return $query->row(0);
            
            return $query->result();
         	}
         else
            return 'empty';
     	}	
	function getCategories($options = array())
		{
	    $this->db->select('*');
		$this->db->from($this->db->dbprefix('blog_category'));
		$this->db->where('blogc_status', $options['blogc_status']);  
	    $this->db->order_by("blogc_id", "ASC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {                          
            return $query->result();
         	}
         else
            return 'empty';
		}
	}
?>
