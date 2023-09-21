<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prodi_model extends CI_Model
{

   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
   }

   public function get($id_fakultas)
   {
      $this->db->from("tbl_prodi");
      $this->db->where($id_fakultas);
      return $this->db->get();
   }
}
