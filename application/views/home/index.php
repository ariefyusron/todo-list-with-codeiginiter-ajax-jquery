<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Todo list</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url() ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url() ?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
      folder instead of downloading all of them to reduce the load. -->
    <link href="<?= base_url() ?>/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="#" class="logo"><b>Todo</b>List</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="active">
              <a href="#">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <form id="form-store" action="<?= base_url() ?>/home/store">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="todo">
                      <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit" id="submit">
                          Add
                        </button>
                      </span>
                    </div>
                  </form>
                </div>
                <div class="box-body">
                  <table id="todo-table" class="table">
                    <tr>
                      <td class="text-center"><img src="<?= base_url() ?>/assets/dist/img/spinner.gif" width=20></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong>Created By <a href="http://www.instagram.com/a.yusron" target="_blank">Arief Yusron</a>.</strong> Todo List.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url() ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url() ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?= base_url() ?>/assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AJAX -->
    <script>
      $(document).ready(() => {

        function load(){
          const todo = $('#todo-table')
          $.ajax({
            url: 'http://localhost/TodoList/home/todos',
            type: 'GET',
            success: (data) => {
              todo.empty()
              todo.append(data)
            }
          })
        }
        
        load()
        
        $('#form-store').submit(function(e) {
          e.preventDefault()
          const form = $(this)
          const submit = $('#submit')
          $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            beforeSend: () => {
              submit.empty()
              submit.append('<img src="<?= base_url() ?>/assets/dist/img/spinner.gif" width=20>')
            },
            success: (data) => {
              submit.empty()
              submit.append('Add')
              form.trigger('reset')
              load()
            }
          })
        })

      })
    </script>
  </body>
</html>