<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Sistem Aplikasi Absensi</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>'devices'])?>" class="btn btn-white btn-border btn-round mr-2">Manajemen Perangkat</a>
                        <a href="<?=routeTo('crud/index',['table'=>'subjects'])?>" class="btn btn-secondary btn-round">Manajemen Subjek</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12 col-sm-4">
                    <div class="card full-height">
                        <div class="card-body">
                            <center>
                                <b>Data Subjek</b>
                                <h1><?=$subjects?></h1>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card full-height">
                        <div class="card-body">
                            <center>
                                <b>Data Perangkat</b>
                                <h1><?=$devices?></h1>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card full-height">
                        <div class="card-body">
                            <center>
                                <b>Data Presensi</b>
                                <h1><?=$presences?></h1>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>