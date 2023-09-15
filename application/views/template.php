<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BSI Sekar Gendis</title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<link href="<?php echo base_url()?>assets/css/toastr.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?=site_url('dashboard') ?>"><span>BSI</span> SEKAR GENDIS</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Hello, <?= $this->fungsi->user_login()->username ?></div>
				
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="<?=site_url('dashboard') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<li><a href="<?=site_url('desa') ?>"><em class="fa fa-street-view">&nbsp;</em> Desa</a></li>
			<?php } ?>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<li><a href="<?=site_url('unit') ?>"><em class="fa fa-building">&nbsp;</em> Unit</a></li>
			<?php } ?>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<li><a href="<?=site_url('user') ?>"><em class="fa fa-users">&nbsp;</em> User </a></li>
			<?php } ?>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<li><a href="<?=site_url('ketua') ?>"><em class="fa fa-user">&nbsp;</em> Ketua </a></li>
			<?php } ?>			
			<li><a href="<?=site_url('kategori') ?>"><em class="fa fa-sliders">&nbsp;</em> Kategori</a></li>
			<li><a href="<?=site_url('setor') ?>"><em class="fa fa-book">&nbsp;</em> Setor </a></li>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<li><a href="<?=site_url('laporan')?>"><em class="fa fa-print">&nbsp;</em> Cetak Laporan</a></li>
			<?php } ?>
			<li><a href="<?=site_url('changepass')?>"><em class="fa fa-key">&nbsp;</em>Ganti Password</a></li>
			<li><a href="<?=site_url('auth/logout')?>"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

		<?php echo $contents; ?>

	<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/toastr.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/js/custom.js"></script> -->
	<script src="<?php echo base_url()?>assets/js/tables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js" crossorigin="anonymous"></script>

<script>
$(function(){
    var current = window.location.pathname;
    var link = "http://localhost"+current
    $('#sidebar-collapse li a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
        	 $(this).parent().addClass('active').siblings().removeClass('active');
        }
    })
        $('.parent li a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
        	 $(this).parent().addClass('active').siblings().removeClass('active');
			$('#sub-item-1').collapse({
				  toggle: true
				})
				        }
    })
})

	</script>
	<script type="text/javascript">
		$(function () {
			$('#datetimepicker1').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss',
			viewMode: 'years',
			minDate: new Date()
			});
		});
		$(function () {
			$('#datetimepicker2').datetimepicker({
			format: 'YYYY-MM-DD',
			viewMode: 'years',
			});
		});
		$(function () {
			$('#datetimepicker3').datetimepicker({
			format: 'YYYY-MM-DD',
			viewMode: 'years',
			});
		});
		$(function () {
			$('#datetimepicker4').datetimepicker({
			format: 'YYYY-MM-DD',
			viewMode: 'years',
			});
		});
		$(function () {
			$('#datetimepicker5').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss',
			viewMode: 'years',
			minDate: new Date()
			});
		});
		$(function () {
			$('#datetimepicker6').datetimepicker({
			format: 'YYYY-MM-DD',
			viewMode: 'years',
			});
		});
	</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
		$(document).ready(function(){
			$(document).on('click', '#mobil', function(){
				var barcode = $(this).data('barcode');
				var nama_mobil = $(this).data('nama');
				var kondisi = $(this).data('kondisi');
				var img = $(this).data('image');
				$('#barcode').text(barcode);
				$('#nmobil').text(nama_mobil);
				$('#kon').text(kondisi);
				$('#gmbr').attr("src", img);
			})
		})
	</script>
<script>
		$(document).ready(function(){
			$(document).on('click', '#inven', function(){
				var barcode = $(this).data('barcode');
				var nama_mobil = $(this).data('nama');
				var kondisi = $(this).data('kondisi');
				var img = $(this).data('image');
				$('#barcodei').text(barcode);
				$('#ninven').text(nama_mobil);
				$('#koni').text(kondisi);
				$('#gmbri').attr("src", img);
			})
		})
	</script>
	<?php if($this->fungsi->user_login()->level==1 ) {?>
	<script>
			function success_toast($psn){
				toastr.options = {
					"closeButton": true,
					"debug": true,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-center",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": 0,
					"extendedTimeOut": 0,
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut",
					"tapToDismiss": false
					}
				toastr.warning($psn,"Warning");
			}
			function service_toast($psn){
				toastr.options = {
					"closeButton": true,
					"debug": true,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-center",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": 0,
					"extendedTimeOut": 0,
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut",
					"tapToDismiss": false
					}
				toastr.info($psn,"Remember");
			}
		</script>
	<?php echo "<script>
	$(document).ready(function(){
		var visited = localStorage.getItem('visited');
		console.log(visited);
		if(visited == 'false') {
		if(window.location == '".site_url('dashboard')."'){
			var i;
			for (i = 0; i < cars.length; i++) {
				success_toast(cars[i]);
			}
			var x;
			for (x = 0; x < services.length; x++) {
				service_toast(services[x]);
			}
		}
		localStorage.setItem('visited', true);
	}
	})
	</script>" ?>
	<?php } ?>
</body>
<div class="fixed-bottom" style="margin-top: 45%;"><p class="text-right">&copy;ppmt unimma </p></div>


</html>