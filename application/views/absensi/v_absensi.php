
<!-- 
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Morris Js</h3>
</div>
<div class="title_right">
<div class="col-md-5 col-sm-5   form-group pull-right top_search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
<button class="btn btn-default" type="button">Go!</button>
</span>
</div>
</div>
</div>
</div> -->
<section class="content">
<div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('absensi/c_absensi/uploaddata') ?> 
                            <div class="row">
                                <div class="col-4">
                                    <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                                <div class="col">
                                   <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
</div>

</div>