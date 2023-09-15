<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->        
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-university color-blue"></em>
                            <div class="large"><?php echo $unit; ?></div>
                            <div class="text-muted">Unit</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-user-circle color-orange"></em>
                            <div class="large"><?php echo $user; ?></div>
                            <div class="text-muted">Pengguna</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-user-secret color-teal"></em>
                            <div class="large"><?php echo $ketua; ?></div>
                            <div class="text-muted">Ketua Unit</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-home color-red"></em>
                            <div class="large"><?php echo $desa; ?></div>
                            <div class="text-muted">Desa</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-12 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><!-- <em class="fa fa-xl fa-archive color-teal"></em> -->
                            <div class="profile-usertitle-name">Selamat datang, <?= $this->fungsi->user_login()->username ?> di Sistem Informasi BSI Sekar Gendis
                        </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-archive color-teal"></em>
                            <div class="large"><?php echo $setor; ?></div>
                            <div class="text-muted">Setor</div>
                        </div>
                    </div>
                </div> -->
            </div><!--/.row-->
        </div>
</div>