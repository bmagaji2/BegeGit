<?php
class connectlab {
	public $mem_id;
	public $mem_name;
	public $mem_pic;
	public $mem_gender;
	public $mem_email;
	public $mem_dep;
	public $mem_description;
	
	public function __construct($array) {
        $this->mem_id = $array['mem_id']; 
        $this->mem_name = $array['mem_name']; 
        $this->mem_pic = $array['mem_pic']; 
        $this->mem_gender = $array['mem_gender']; 
        $this->mem_email = $array['mem_email'];
        $this->mem_dep = $array['mem_dep'];
        $this->mem_description = $array['mem_description'];
	}
}

?>