<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fakultas_model extends CI_Model
{

   function __construct(){
      // Call the Model constructor
      parent::__construct();
   }

   public function get(){
      $this->db->from("tbl_fakultas");
      return $this->db->get();
   }
}