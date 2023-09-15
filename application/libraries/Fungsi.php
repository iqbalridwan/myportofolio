<?php 

Class Fungsi{
	protected $ci;
	function __construct(){
		$this->ci =& get_instance();

	}

	function user_login() {
		$this->ci->load->model('users_m');
		$id_admin = $this->ci->session->userdata('id_admin');
		$user_data = $this->ci->users_m->getall($id_admin)->row();
		return $user_data;
	}
	function pdfGenerator($html,$filename,$paper,$orientation){
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper, $orientation);

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($filename,array('Attachment'=>0));
	}

}
 ?>
