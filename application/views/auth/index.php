<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets') ?>/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets') ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets') ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets') ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Login System</b></a>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open("Auth/", array('method' => 'POST', 'class' => 'login-form')); ?>

                <div class="msg">Silahkan Masukkan username dan password</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <div class="text-left"><?php echo form_error('username'); ?></div>
                        <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Username', 'name' => 'username', 'id' => 'username')); ?>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <div class="text-left"> <?php echo form_error('password'); ?> </div>
                        <?php echo form_input(array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'name' => 'password', 'id' => 'password')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button class="btn btn-danger btn-sm" style="width: 100%;" type="submit"> Masuk</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <label class="text-left">
                        <?php
                        $message = $this->session->flashdata('result_login');
                        if ($message) { ?>
                            <div style="color: red;"><?php echo $message; ?></div>
                        <?php } ?>
                    </label>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets') ?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('assets') ?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets') ?>/js/admin.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/pages/examples/sign-in.js"></script>
</body>

</html>