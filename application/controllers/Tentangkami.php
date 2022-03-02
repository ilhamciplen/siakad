<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentangkami extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }
    public function sambutankepsek()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_sambutankepsek');
    }
    public function sejarah()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_sejarah');
    }
    public function visimisi()
    {


        /*$data['info_lomba'] = $this->db->get('info_lomba')->result();*/

        $this->load->view('v_visimisi');
    }

}