<?php
Class Pattern implements JsonSerializable {
	private $id;
	private $pattern_id;
	private $block_amount;
	
	public function __construct($id, $pattern_id, $block_amount) {
		$this->id = $id;
		$this->pattern_id = $pattern_id;
		$this->block_amount = $block_amount;
	}
	
	public function set_id($id) {
		$this->id = $id;
	}
	
	public function get_id() {
		return $this->id;
	}
	
	public function set_pattern_id($pattern_id) {
		$this->pattern_id = $pattern_id;
	}
	
	public function get_pattern_id() {
		return $this->pattern_id;
	}
	
	public function set_block_amount($block_amount) {
		$this->block_amount = $block_amount;
	}
	
	public function get_block_amount() {
		return $this->block_amount;
	}
	
	public function jsonSerialize() {
       $array;
       $array['id'] = $this->id;
       $array['pattern_id'] = $this->pattern_id;
       $array['block_amount'] = $this->block_amount;
       
       return $array;
   }
}