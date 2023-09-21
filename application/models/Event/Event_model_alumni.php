<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Event_model_alumni extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get($id_event_alumni = null)
    {
        $this->db->from("tbl_event_alumni");
        $this->db->where($id_event_alumni);
        return $this->db->get();
    }

    public function get_list()
    { # kondisi = array();
        $this->db->select('tea.id_event_alumni, DATE_FORMAT(tea.tanggal_event, "%e %M %Y") AS tanggal_event, tea.type, tea.time, tea.venue, COUNT(tra.id_event_alumni) AS total, tea.kuota - COUNT(tra.id_event_alumni) AS sisa_kuota, tea.aktif');
        $this->db->from('tbl_event_alumni AS tea');
        $this->db->join('tbl_registrant_alumni as tra', 'tea.id_event_alumni = tra.id_event_alumni', 'LEFT');
        $this->db->where(array('aktif' => 'Aktif'));
        $this->db->group_by('tea.id_event_alumni');
        $this->db->order_by('tea.tanggal_event');
        return $this->db->get();
    }

    public function get_peserta_perevent($id_event_alumni = null)
    {
        $this->db->select('DATE_FORMAT(tbl_event_alumni.tanggal_event, "%e %M %Y") as tanggal, tbl_event_alumni.type as typee, tbl_event_alumni.time as waktu, tbl_event_alumni.venue as tempat, UPPER(tbl_peserta_alumni.nama_peserta) as nama,tbl_peserta_alumni.status as statuss,tbl_peserta_alumni.npm as npmm,tbl_peserta_alumni.email as emaill, tbl_peserta_alumni.no_hp as nohp,tbl_fakultas.nama_fakultas as fakultas,tbl_prodi.nama_prodi as prodi');
        $this->db->from('tbl_event_alumni');
        $this->db->join('tbl_registrant_alumni', 'tbl_event_alumni.id_event_alumni = tbl_registrant_alumni.id_event_alumni');
        $this->db->join('tbl_peserta_alumni', 'tbl_registrant_alumni.id_registrant_toeic = tbl_peserta_alumni.id_peserta_toeic');
        $this->db->join('tbl_fakultas', 'tbl_peserta_alumni.id_fakultas = tbl_fakultas.id_fakultas');
        $this->db->join('tbl_prodi', 'tbl_peserta_alumni.id_prodi = tbl_prodi.id_prodi');
        $this->db->where($id_event_alumni);
        $this->db->order_by('tbl_registrant_alumni.id_registrant_toeic');
        return $this->db->get();
    }
}
