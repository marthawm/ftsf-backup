<?php
Class Column implements JsonSerializable {
   private $id;
   private $pattern_obj;
   private $column;
   
   public function __construct($id, $pattern_obj, $column) {
       $this->id = $id;
       $this->pattern_obj = $pattern_obj;
       $this->column = $column;
   }
   
   public function set_id($id) {
       $this->id = $id;
   }
   
   public function get_id() {
       return $this->id;
   }
   
   public function set_pattern($pattern_obj) {
       $this->pattern_obj = $pattern_obj;
   }
   
   public function get_pattern() {
       return $this->pattern_obj;
   }
   
   public function set_column($column) {
       $this->column = $column;
   }
   
   public function get_column() {
       return $this->column;
   }
   
   	public function jsonSerialize() {
       $array;
       $array['id'] = $this->id;
       $array['pattern'] = $this->pattern_obj->jsonSerialize();
       $array['column'] = $this->column;
       
       return $array;
   }
}