<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta_model extends CI_Model
{

   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
   }

   // public function cekpeserta($npm)
   // {
   //    $this->db->select('npm');
   //    $this->db->from('tbl_peserta');
   //    $this->db->where('npm =', $npm);
   //    return $this->db->get();
   // }

   public function insert($data, $data_event)
   {
      $this->db->insert('tbl_peserta', $data);
      $id = $this->db->insert_id();

      $registrant = array(
         'id_event' => $data_event,
         'id_peserta' => $id
      );
      $this->db->insert('tbl_registrant', $registrant);
      return $id;
   }
}
