<?php
Class Position implements JsonSerializable {
   private $id;
   private $column_obj;
   private $post_obj;
   private $block_pattern_id;
   
   public function __construct($id, $column_obj, $post_obj, $block_pattern_id) {
       $this->id = $id;
       $this->column_obj = $column_obj;
       $this->post_obj = $post_obj;
       $this->block_pattern_id = $block_pattern_id;
   }
   
   public function set_id($id) {
       $this->id = $id;
   }
   
   public function get_id() {
       return $this->id;
   }
   
   public function set_column($column_obj) {
       $this->column_obj = $column_obj;
   }
   
   public function get_column() {
       return $this->column_obj;
   }
   
   public function set_post($post_obj) {
       $this->post_obj = $post_obj;
   }
   
   public function get_post() {
       return $this->post_obj;
   }
   
   public function set_block_pattern_id($block_pattern_id) {
       $this->block_pattern_id = $block_pattern_id;
   }
   
   public function get_block_pattern_id() {
       return $this->block_pattern_id;
   }
   
   public function jsonSerialize() {
       $array;
       $array['id'] = $this->id;
       $array['column'] = $this->column_obj->jsonSerialize();
       $array['post'] = $this->post_obj->jsonSerialize();
       $array['block_pattern_id'] = $this->block_pattern_id;
       
       return $array;
   }
}