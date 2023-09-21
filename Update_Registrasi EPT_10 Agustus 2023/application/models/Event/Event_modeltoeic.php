<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Event_modeltoeic extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get($id_event_toeic = null)
    {
        $this->db->from("tbl_event_toeic");
        $this->db->where($id_event_toeic);
        return $this->db->get();
    }

    public function get_list()
    { # kondisi = array();
        $this->db->select('tet.id_event_toeic, DATE_FORMAT(tet.tanggal_event, "%e %M %Y") AS tanggal_event, tet.type, tet.time, tet.venue, COUNT(trt.id_event_toeic) AS total, tet.kuota - COUNT(trt.id_event_toeic) AS sisa_kuota, tet.aktif');
        $this->db->from('tbl_event_toeic AS tet');
        $this->db->join('tbl_registrant_toeic as trt', 'tet.id_event_toeic = trt.id_event_toeic', 'LEFT');
        $this->db->where(array('aktif' => 'Aktif'));
        $this->db->group_by('tet.id_event_toeic');
        $this->db->order_by('tet.tanggal_event');
        return $this->db->get();
    }

    public function get_peserta_perevent($id_event_toeic = null)
    {
        $this->db->select('DATE_FORMAT(tbl_event_toeic.tanggal_event, "%e %M %Y") as tanggal, tbl_event_toeic.type as typee, tbl_event_toeic.time as waktu, tbl_event_toeic.venue as tempat, UPPER(tbl_peserta_toeic.nama_peserta) as nama,tbl_peserta_toeic.status as statuss,tbl_peserta_toeic.npm as npmm,tbl_peserta_toeic.email as emaill, tbl_peserta_toeic.no_hp as nohp,tbl_fakultas.nama_fakultas as fakultas,tbl_prodi.nama_prodi as prodi');
        $this->db->from('tbl_event_toeic');
        $this->db->join('tbl_registrant_toeic', 'tbl_event_toeic.id_event_toeic = tbl_registrant_toeic.id_event_toeic');
        $this->db->join('tbl_peserta_toeic', 'tbl_registrant_toeic.id_registrant_toeic = tbl_peserta_toeic.id_peserta_toeic');
        $this->db->join('tbl_fakultas', 'tbl_peserta_toeic.id_fakultas = tbl_fakultas.id_fakultas');
        $this->db->join('tbl_prodi', 'tbl_peserta_toeic.id_prodi = tbl_prodi.id_prodi');
        $this->db->where($id_event_toeic);
        $this->db->order_by('tbl_registrant_toeic.id_registrant_toeic');
        return $this->db->get();
    }
}
