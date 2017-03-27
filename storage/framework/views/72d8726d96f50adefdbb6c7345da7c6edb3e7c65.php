<?php $__env->startSection('headimport'); ?> 
    <!-- Datatables -->
    <link href="<?php echo URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                      Users
                      <small>
                          
                      </small>
                  </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Information users </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>fName</th>
                          <th>lName</th>
                          <th>user_id</th>
                          <th>email</th>
                          <th>address</th>
                          <th>Phoneno</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger</td>
                          <td>Nixon</td>
                          <td>10541</td>
                          <td>61@mail.com</td>
                          <td>เขาใหญ่</td>
                          <td>0321450000</td>
                        </tr>
                        <tr>
                          <td>Garrett</td>
                          <td>Winters</td>
                          <td>10542</td>
                          <td>63@mail.com</td>
                          <td>กรุงเทพ</td>
                          <td>0369580024</td>
                        </tr>
                        <tr>
                          <td>Ashton</td>
                          <td>Cox</td>
                          <td>10543</td>
                          <td>66@mail.com</td>
                          <td>บางแค</td>
                          <td>0236547845</td>
                        </tr>
                        <tr>
                          <td>Cedric </td>
                          <td>Kelly</td>
                          <td>10544</td>
                          <td>22@mail.com</td>
                          <td>บางใหญ่</td>
                          <td>0120123005</td>
                        </tr>
                        <tr>
                          <td>Airi </td>
                          <td>Satou</td>
                          <td>10545</td>
                          <td>33@mail.com</td>
                          <td>บางซ่อน</td>
                          <td>0145628734</td>
                        </tr>
                        <tr>
                          <td>Brielle</td>
                          <td>Williamson</td>
                          <td>10546</td>
                          <td>61@mail.com</td>
                          <td>ทุ้งครุ</td>
                          <td>0236547819</td>
                        </tr>
                        <tr>
                          <td>Herrod</td>
                          <td>Chandler</td>
                          <td>10547</td>
                          <td>59@mail.com</td>
                          <td>กทม.</td>
                          <td>0147852369</td>
                        </tr>
                        <tr>
                          <td>Rhona</td>
                          <td>Davidson</td>
                          <td>10548</td>
                          <td>55@mail.com</td>
                          <td>บางบอน</td>
                          <td>0541258963</td>
                        </tr>
                        <tr>
                          <td>Colleen</td>
                          <td>Hurst</td>
                          <td>10549</td>
                          <td>39@mail.com</td>
                          <td>บางแค</td>
                          <td>0321547846</td>
                        </tr>
                        <tr>
                          <td>Sonya</td>
                          <td>Frost</td>
                          <td>10550</td>
                          <td>23@mail.com</td>
                          <td>บางซ่อน</td>
                          <td>0215478457</td>
                        </tr>
                        <tr>
                          <td>Jena</td>
                          <td>Gaines</td>
                          <td>10551</td>
                          <td>30@mail.com</td>
                          <td>บางขุนศรี</td>
                          <td>0345355445</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              
        <!-- /page content -->
<?php $__env->stopSection(); ?>
  <?php $__env->startSection('footercss'); ?> 
      
    <!-- Datatables -->
    <script src="<?php echo URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?php echo URL::asset('vendors/datatables.net-scroller/js/datatables.scroller.min.js'); ?>"></script>
    <script src="{!! URL::asset('vendors/jszip/dist/jszip.min.js"></script>
    <script src="{!! URL::asset('vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{!! URL::asset('vendors/pdfmake/build/vfs_fonts.js"></script>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>