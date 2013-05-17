<?php

class proposal{
    
 public  $approvedReviewer=0;
 public $approvedAdviser=0;
 public $approvedPeerReview=0;
 public $title;
 public function setApprovedReviwer()  
    {  
        $this->approvedReviewer = 1;  
    }  
    
     public function setApprovedAdviser()  
    {  
        $this->approvedAdviser = 1;  
    }
    
     public function setApprovedPeerReview()  
    {  
        $this->approvedPeerReview = 1;  
    }
    
    public function setTitle($name)  
    {  
        $this->title = $name;  
    }
    
}
?>
