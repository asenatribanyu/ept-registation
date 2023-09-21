<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Event_model extends CI_Model
{

   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
   }

   public function get($id_event = null)
   {
      $this->db->from("tbl_event");
      $this->db->where($id_event);
      return $this->db->get();
   }

   public function get_list()
   { # kondisi = array();
      $this->db->select('te.id_event, DATE_FORMAT(te.tanggal_event, "%e %M %Y") AS tanggal_event, te.type, te.time, te.venue, COUNT(tr.id_event) AS total, te.kuota - COUNT(tr.id_event) AS sisa_kuota, te.aktif');
      $this->db->from('tbl_event AS te');
      $this->db->join('tbl_registrant as tr', 'te.id_event = tr.id_event', 'LEFT');
      $this->db->where(array('aktif' => 'Aktif'));
      $this->db->group_by('te.id_event');
      $this->db->order_by('te.tanggal_event');
      return $this->db->get();
   }

   public function get_peserta_perevent($id_event = null)
   {
      $this->db->select('DATE_FORMAT(tbl_event.tanggal_event, "%e %M %Y") as tanggal, tbl_event.type as typee, tbl_event.time as waktu, tbl_event.venue as tempat, UPPER(tbl_peserta.nama_peserta) as nama,tbl_peserta.status as statuss,tbl_peserta.npm as npmm,tbl_peserta.email as emaill, tbl_peserta.no_hp as nohp,tbl_fakultas.nama_fakultas as fakultas,tbl_prodi.nama_prodi as prodi,tbl_peserta.waktu_input as waktu_input');
      $this->db->from('tbl_event');
      $this->db->join('tbl_registrant', 'tbl_event.id_event = tbl_registrant.id_event');
      $this->db->join('tbl_peserta', 'tbl_registrant.id_registrant = tbl_peserta.id_peserta');
      $this->db->join('tbl_fakultas', 'tbl_peserta.id_fakultas = tbl_fakultas.id_fakultas');
      $this->db->join('tbl_prodi', 'tbl_peserta.id_prodi = tbl_prodi.id_prodi');
      $this->db->where($id_event);
      $this->db->order_by('tbl_registrant.id_registrant');
      return $this->db->get();
   }
}
