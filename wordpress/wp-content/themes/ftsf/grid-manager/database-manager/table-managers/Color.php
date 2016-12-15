<?php
Class Color implements JsonSerializable {
    private $id;
    private $hex;
	private $name;
    
    public function __construct($id, $hex, $name) { 
        $this->id = $id;
        $this->hex = $hex;
        $this->name = $name;
    }
    
    public function set_id($id) {
        $this->id = $id;
    }
    
    public function get_id() {
        return $this->id;
    }
    
    public function set_hex($hex) {
        $this->hex = $hex;
    }
    
    public function get_hex() {
        return $this->hex;
    }
	
	public function set_name($name) {
		$this->name = $name;
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function to_array() {
       return get_object_vars($this);
   }
   
   public function jsonSerialize() {
       $array;
       $array['id'] = $this->id;
       $array['hex'] = $this->hex;
       $array['name'] = $this->name;
       
       return $array;
   }
}