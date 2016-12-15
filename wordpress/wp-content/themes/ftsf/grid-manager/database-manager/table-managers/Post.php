<?php
Class Post implements JsonSerializable {
	//Wordpress page variables
	private $id;
	private $content;
	private $title;
	private $status;
	private $name;
	private $type;
	
	//Custom metadata variables
	private $meta_id;
	private $subtitle;
	private $quote;
	private $hide_title;
	private $css_animation;
	private $color_obj; //Color object gets saved into here
	private $font_style;
	private $font_size;
	
	public function __construct($id, $content, $title, $status, $name, $type, $meta_id, $subtitle, $quote, $hide_title, $css_animation, $color_obj, $font_style, $font_size) {
		$this->id = $id;
		$this->content = $content;
		$this->title = $title;
		$this->status = $status;
		$this->name = $name;
		$this->type = $type;
		$this->meta_id = $meta_id;
		$this->subtitle = $subtitle;
		$this->quote = $quote;
		$this->hide_title = $hide_title;
		$this->css_animation = $css_animation;
		$this->color_obj = $color_obj;
		$this->font_style = $font_style;
		$this->font_size = $font_size;
	}
	
	public function set_id($id) {
		$this->id = $id;
	}
	
	public function get_id() {
		return $this->id;
	}
	
	public function set_content($content) {
		$this->content = $content;
	}
	
	public function get_content() {
		return $this->content;
	}
	
	public function set_title($title) {
		$this->title = $title;
	}
	
	public function get_title() {
		return $this->title;
	}
	
	public function set_status($status) {
		$this->status = $status;
	}
	
	public function get_status() {
		return $this->status;
	}
	
	public function set_name($name) {
		$this->name = $name;
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function set_type($type) {
		$this->type = $type;
	}
	
	public function get_type() {
		return $this->type;
	}
	
	public function set_meta_id($meta_id) {
		$this->meta_id = $meta_id;
	}
	
	public function get_meta_id() {
		return $this->meta_id;
	}
	
	public function set_subtitle($subtitle) {
		$this->subtitle = $subtitle;
	}
	
	public function get_subtitle() {
		return $this->subtitle;
	}
	
	public function set_quote($quote) {
		$this->quote = $quote;
	}
	
	public function get_quote() {
		return $this->quote;
	}
	
	public function set_hide_title($hide_title) {
		$this->hide_title = $hide_title;
	}
	
	public function hide_title() {
		return $this->hide_title;
	}
	public function set_css_animation($css_animation){
		$this->css_animation = $css_animation;
	}

	public function css_animation(){
		return $this->css_animation;
	}
	
	public function set_color($color_obj) {
		$this->color_obj = $color_obj;
	}
	
	public function get_color() {
		return $this->color_obj;
	}
	
	public function set_font_style($font_style) {
		$this->font_style = $font_style;
	}
	
	public function get_font_style() {
		return $this->font_style;
	}
	
	public function set_font_size($font_size) {
		$this->font_size = $font_size;
	}
	
	public function get_font_size() {
		return $this->font_size;
	}
	
	public function jsonSerialize() {
       $array;
       $array['id'] = $this->id;
       $array['content'] = $this->content;
       $array['title'] = $this->title;
	   $array['status'] = $this->status;
	   $array['name'] = $this->name;
	   $array['type'] = $this->type;
	   $array['meta_id'] = $this->meta_id;
	   $array['subtitle'] = $this->subtitle;
	   $array['quote'] = $this->quote;
	   $array['hide_title'] = $this->hide_title;
	   $array['css_animation'] = $this->css_animation;
	   $array['color'] = $this->color_obj->jsonSerialize();
	   $array['font_style'] = $this->font_style;
	   $array['font_size'] = $this->font_size;
       
       return $array;
   }
}