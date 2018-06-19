<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Babyeo | Admin</title>

    <link href="<?php echo base_url('admin_assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('admin_assets/'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url('admin_assets/'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('admin_assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 style="margin-right: 10px;" class="logo-name"><img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="Babyeo"></h1>

            </div>
            <h3>Welcome to ......</h3>
           
            <p>Login in. To see it in action.</p>

              <?php if ($this->session->flashdata('success')) { 
                             echo getMessage('success', $this->session->flashdata('success'));
                         }  if ($this->session->flashdata('error')) { 
                             echo  getMessage('error', $this->session->flashdata('error'));
                         }  if ($this->session->flashdata('info')) { 
                             echo  getMessage('info', $this->session->flashdata('info'));
                         }?>

                         
            <form class="m-t" role="form" action="<?php echo site_url('admin/login'); ?>" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="" name="username" id="username" value="<?php echo set_value('username'); ?>">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password">
                    <?php echo form_error('password'); ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small>Perpetualweb &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('admin_assets/'); ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('admin_assets/'); ?>js/bootstrap.min.js"></script>

</body>

<style type="text/css">
      .alert-danger {
            color: #ffffff;
            background-color: rgb(237,85,101);
            border-color: rgb(237,85,101);
        }
</style>

<script type="text/javascript">
     $(document).ready(function() {
       setTimeout(function() {
            $( ".alert" ).slideUp("normal", function() { $(this).remove(); } );
        }, 2300);
   });
</script>

</html>
