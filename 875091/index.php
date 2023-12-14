<?php
session_start();
if(!$_SESSION['username']) {
    header('Location:../');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Courier | Flights</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../favicon.png">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/toastr-master/build/toastr.min.css">

    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_css.css">

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="../images/awa_logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li style="line-height: 30px;">
                        <a href="../220101/"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a></li>

                        <!-- PARCEL -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-gift"></i>Add Parcel</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="addParcel"><i class="fa fa-plus"></i>
                                    <a href="../254039/"> Domestic Parcel </a>
                                </li>
                                <li id="addRegionalParcel"><i class="fa fa-plus"></i>
                                    <a href="../984631/"> Regional Parcel </a>
                                </li>
                                <li id="parcelTracking"><i class="fa fa-map-marker"></i>
                                    <a href="../657342/">Parcel Tracking </a>
                                </li>
                                <li id="searchParcel"><i class="fa fa-search"></i>
                                    <a href="../539430/"> Search Parcel </a>
                                </li>
                                <li id="viewDetails"><i class="fa fa-list"></i>
                                    <a href="../135498/"> View Daily Parcels </a>
                                </li>
                                <li id="viewDiary"><i class="fa fa-list"></i>
                                    <a href="../594645/"> Diary </a>
                                </li>
                                <li id="viewParcelType"><i class="fa fa-list"></i>
                                    <a href="../661341/"> Parcel Types </a>
                                </li>                                                     
                            </ul>
                        </li>

                        <!-- PARCEL -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-money"></i>Payments</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="addPayment"><i class="fa fa-exchange"></i>
                                    <a href="../386747/"> New Payment </a>
                                </li>
                                <li id="addRegionalParcel"><i class="fa fa-plus"></i>
                                    <a href="../964647/"> Return Parcel Payment </a>
                                </li>
                                <li id="addOverduePay"><i class="fa fa-plus"></i>
                                    <a href="../846668/"> Overdue Payments </a>
                                </li>
                                <li id="viewPayment"><i class="fa fa-dot-circle-o"></i>
                                    <a href="../872927/">View Payment </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="processHome"> <i class="menu-icon fa fa-tasks"></i>Internal Processing</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="processDashboard"><i class="fa fa-circle-o"></i>
                                    <a href="../159716/"> Dashboard </a>
                                </li>

                                <li id="createManifest"><i class="fa fa-pencil"></i>
                                    <a href="../246023/"> Create Manifest </a>
                                </li>
                                <li id="viewManifest"><i class="fa fa-tasks"></i>
                                    <a href="../494819/"> View Manifest </a>
                                </li>
                                <li id="assignConsignment"><i class="fa fa-calendar-check-o"></i>
                                    <a href="../672654/"> Assign Consignment </a>
                                </li>
                                <li id="dispatchConsignment"><i class="fa fa-send"></i>
                                    <a href="../744518/"> Dispatch Consignment </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="receiveHome"> <i class="menu-icon fa fa-level-down"></i>Receive Parcel</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="recViewManifest"><i class="fa fa-eye"></i>
                                    <a href="../335975/"> View Manifest </a>
                                </li>
                                <li id="receiveManifest"><i class="fa fa-handshake-o"></i>
                                    <a href="../787077/"> Receive Manifest </a>
                                </li>
                                <li id="delivery"><i class="fa fa-truck"></i>
                                    <a href="../693641/"> Delivery </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="financeHome"> <i class="menu-icon fa fa-usd"></i>Finance</a>
                            <ul class="sub-menu children dropdown-menu">

                                <li id="financeDashboard"><i class="fa fa-circle-o"></i>
                                    <a href="../677408/">Dashboard </a>
                                </li>

                                <li id="financeViewSent"><i class="fa fa-circle-o"></i>
                                    <a href="../497252/">Local Parcel Report </a>
                                </li>

                                <li id="financeNewPayment"><i class="fa fa-circle-o"></i>
                                    <a href="../984961/">New Payment Report </a>
                                </li>

                                <li id="financeOverduePayment"><i class="fa fa-circle-o"></i>
                                    <a href="../656186/">Overdue Payment Report </a>
                                </li>

                                <li id="financeReturnPayment"><i class="fa fa-circle-o"></i>
                                    <a href="../766861/">Return Payment Report </a>
                                </li>

                                <li id="financeViewCompanySent"><i class="fa fa-circle-o"></i>
                                    <a href="../403524/">Company Parcel Report </a>
                                </li>

                            </ul>
                        </li>

                        <li class="menu-item-has-children dropdown keep-open">
                            <a href="#" class="dropdown-toggle index" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="settingHome"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="users"><i class="fa fa-user"></i>
                                    <a href="../920033/">Users </a>
                                </li>
                                <li id="userGroups"><i class="fa fa-users"></i>
                                    <a href="../548514/">Users Groupings </a>
                                </li>
                                <li id="customers"><i class="fa fa-address-book-o"></i>
                                    <a href="../200940/">Customers </a>
                                </li>
                                <li id="branches"><i class="fa fa-arrows-alt"></i>
                                    <a href="../285196/">Stations </a>
                                </li>
                                <li id="flights" class="_active"><i class="fa fa-plane"></i>
                                    <a href="../875091/">Flights </a>
                                </li>
                                <li id="rates"><i class="fa fa-money"></i>
                                    <a href="../495400/">Rates </a>
                                </li>
                                <li id="log"><i class="fa fa-history"></i>
                                    <a href="../904018/">Log </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <h6>Flights</h6>
                    </div> 

                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="<?php echo '../uploads/'.$_SESSION['image'] ?>" style="width: 30px;height: 30px;" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="../648684/"><i class="fa fa-user"></i> My Profile</a>

                                <a class="nav-link" href="../"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </header><!-- /header -->
            <!-- Header-->

            <div class="content mt-3">
                <div class="card">
                    <div class="card-title">List of Manifests for Receiving Items</div>
                    <div class="card-body" style="width: 50%;margin-left: 20%;width: 60%;padding: 20px;box-shadow: 2px 2px 9px 1px #efeeee;">
                        <span style="float: right;"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Flight</button></span>
                        <br>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="flight_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="flight_body">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div> <!-- .content -->
        </div><!-- /#right-panel -->

        <!-- Search Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Flight</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <form id="addForm">

              <div class="form-group">
                  <input type="text" name="flight_name" class="form-control" placeholder="Flight Name">
              </div>

              <div class="form-group">
                  <textarea name="flight_descr" placeholder="Flight Description" class="form-control"></textarea>
              </div>

          </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
        <button onclick="addFlight()" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>

    </div>
</div>
</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Flight</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">
    <form id="editForm">

      <div class="form-group">
          <input type="text" name="edit_flight_name" class="form-control" placeholder="Flight Name">
      </div>

      <div class="form-group">
          <textarea name="edit_flight_descr" placeholder="Flight Description" class="form-control"></textarea>
      </div>

  </form>

</div>
<div class="modal-footer">
    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
    <button id="delBtn" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
    <button id="saveBtn" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>

</div>
</div>
</div>
</div>

<!-- Right Panel -->

<script src="../vendors/jquery/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/toastr-master/build/toastr.min.js"></script>
<script src="../js/access.js"></script>

<script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="../assets/js/dashboard.js"></script>

<!-- Tables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>
<script src="../js/function.js"></script>
<script src="function.js"></script>
<script type="text/javascript">
    keep_open("keep-open,index");
</script>
</body>

</html>
