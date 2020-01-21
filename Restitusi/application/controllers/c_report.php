<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_report extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Report', '', TRUE);
		$this->load->helper(array('form', 'url'));
	}

	/*public function index()
	{
		//ambil data siswa untuk ditampilkan 
		$data = $this->Msiswa->datasiswa();
		$this->load->view('laporan/v_report', ['data'=>$data]);
	}*/

	public function index()
	{
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report_download',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}

	public function laporan_pdf($no_restitusi){

	    /*$data = array(
	        "dataku" => array(
	            "no_restitusi" => $no_restitusi
	        ),
	        "dataku2" => array(
	            "nip" => $nip
	        ),
	        "dataku3" => array(
	            "name" => $name
	        ),
	    );*/
		
		$data['restitusi']=$this->M_Report->restitusi($no_restitusi);

	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-petanikode.pdf";
	    $this->pdf->load_view('report_download', $data);
	}


	public function laporan_pdf2($no_restitusi){

	    /*$data = array(
	        "dataku" => array(
	            "no_restitusi" => $no_restitusi
	        ),
	        "dataku2" => array(
	            "nip" => $nip
	        ),
	        "dataku3" => array(
	            "name" => $name
	        ),
	    );*/

	    
		
		$data['restitusi']=$this->M_Report->restitusi($no_restitusi);

	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-petanikode.pdf";
	    $this->pdf->load_view('report_download2', $data);
	}


	/*public function index()
 	{
  		$data['title'] = "Join CodeIgniter"; 

    	// query memanggil function duatable di model
    	$data['join2'] = $this->M_Report->restitusi(); 
  		$this->load->view('nong',$data);    
  
 } */

 public function laporan_pdf3($no_restitusi){

	    /*$data = array(
	        "dataku" => array(
	            "no_restitusi" => $no_restitusi
	        ),
	        "dataku2" => array(
	            "nip" => $nip
	        ),
	        "dataku3" => array(
	            "name" => $name
	        ),
	    );*/

	    
		
		$data['restitusi_agenda']=$this->M_Report->sppd($no_restitusi);

	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-petanikode.pdf";
	    $this->pdf->load_view('report_download3', $data);
	}

}
