<script type="text/javascript">
    function logout() {
        swal({
                title: "Anda yakin ingin keluar ?",
                type: "warning",
                // imageUrl: "<?php echo base_url() ?>assets/images/user.png",
                text: "Klik tombol Yes untuk Keluar ",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: "<?php echo site_url('auth/logout'); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success: function(data) {
                        $url = '<?php echo base_url('/auth/') ?>';
                        setTimeout(() => {
                            $(location).attr('href', $url)
                        }, 1400);
                        return swal({
                            html: true,
                            timer: 1300,
                            showConfirmButton: false,
                            title: data['msg'],
                            type: data['status']
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error to Log out, check the connection or configuration !');
                    }
                });
            });
    }
</script>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">

            <div class="info-container">

                <div class="btn-group user-helper-dropdown">
                    <button class="btn btn-primary btn-sm" onclick="logout()"> Logout <i class="material-icons">logout</i></button>

                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>

                <?php if (($this->session->userdata('role') == 'administrator') || ($this->session->userdata('role') == 'pimpinan')) { ?>
                    <li class="<?php if (isset($active_home)) {
                                    echo $active_home;
                                } ?>">
                        <a href="<?php echo base_url('home'); ?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="<?php if (isset($active_visualisasi)) {
                                    echo $active_visualisasi;
                                } ?>">
                        <a href="<?php echo base_url('visualisasi/index/') . date('Y'); ?>">
                            <i class="material-icons">trending_up</i>
                            <span>Statistics & Visualization</span>
                        </a>
                    </li>
                    <li class="<?php if (isset($active_kpi)) {
                                    echo $active_kpi;
                                } ?>">
                        <a href="<?php echo base_url('visualisasi/performanceIndicators') ?>">
                            <i class="material-icons">bar_chart</i>
                            <span>Key Performance Indicators</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('role') == 'administrator') { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">

                            <i class="material-icons">widgets</i>
                            <span>Upload Data</span>

                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
                                <a href="<?php echo base_url('c_karakter') ?>">
                                    <i class="material-icons">content_copy</i>
                                    <span>Data Karakter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('absensi/c_absensi/index') ?>">
                                    <i class="material-icons">content_copy</i>
                                    <span>Data Absensi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('prestasi/c_prestasi') ?>">
                                    <i class="material-icons">content_copy</i>
                                    <span>Data Prestasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('guru/c_guru/index') ?>">
                                    <i class="material-icons">content_copy</i>
                                    <span>Data Guru</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>


            </ul>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>




<