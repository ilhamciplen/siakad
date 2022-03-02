<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }
    public function audiovideo()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_tav');
    }
    public function tkr()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_tkr');
    }
    public function akuntansi()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_akuntansi');
    }
    public function administrasi_perkantoran()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_ap');
    }

    public function busana_butik()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_bb');
    }
    public function kecantikan_rambut()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_kr');
    }
    public function ankes()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_ankes');
    }
    

}