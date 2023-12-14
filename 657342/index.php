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
    <title>Courier | Parcel Tracking</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../favicon.png">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_css.css">
    <link rel="stylesheet" href="track.css">

    <style type="text/css">
        .text-white {
            color: white;
        }
        #searchBtn:hover {
            cursor: pointer;
        }
    </style>
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
                        <li class="menu-item-has-children dropdown keep-open">
                            <a href="#" class="dropdown-toggle index" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-gift"></i>Add Parcel</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="addParcel"><i class="fa fa-plus"></i>
                                    <a href="../254039/"> Domestic Parcel </a>
                                </li>
                                <li id="addRegionalParcel"><i class="fa fa-plus"></i>
                                    <a href="../984631/"> Regional Parcel </a>
                                </li>
                                <li id="parcelTracking" class="_active"><i class="fa fa-map-marker"></i>
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

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="settingHome"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
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
                                <li id="flights"><i class="fa fa-plane"></i>
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
                        <h6>Parcel Tracking</h6>
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
                    <!-- <div class="card-title"></div> -->
                    <div class="card-body">
                        <div style="display: flex;margin-left: 30%;">
                            <input type="text" name="search_code" class="form-control" placeholder="Search Parcel Code" style="width: 40%;border: none;border-bottom: 1px solid #b3abab;">

                            <span style="background-color: #8c9eff;padding: 9px;color: white;box-shadow: 1px 1px 3px 1px #b3abab;" onclick="loadTracking()" id="searchBtn"><i class="fa fa-search"></i> Search</span>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!--  -->

                                <div class="container px-1 px-md-4 py-5 mx-auto">
                                    <div class="card" style="background-color: #8C9EFF;color: white;">
                                        <div class="row d-flex justify-content-between px-3 top">
                                            <div class="d-flex">
                                                <h5>Tracking Details</h5>
                                            </div>
                                            <div class="d-flex flex-column text-sm-right">

                                            </div>
                                        </div>
                                        <!-- Add class 'active' to progress -->
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12">
                                                <ul id="progressbar" class="text-center">
                                                    <li class="step0" id="stage_one"></li>
                                                    <li class="step0" id="stage_two"></li>
                                                    <li class="step0" id="stage_three"></li>
                                                    <li class="step0" id="stage_four"></li>
                                                    <li class="step0" id="stage_five"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between top">
                                            <div class="row d-flex icon-content">
                                                <img class="icon" src="../images/9nnc9Et.png" width="50px">
                                                <div class="d-flex flex-column">
                                                    <p class="font-weight-bold text-white">Parcel<br>Registered</p>
                                                </div>
                                            </div>
                                            <div class="row d-flex icon-content">
                                                <img class="icon" src="../images/u1AzR7w.png">
                                                <div class="d-flex flex-column">
                                                    <p class="font-weight-bold text-white">Assigned<br>Manifest</p>
                                                </div>
                                            </div>
                                            <div class="row d-flex icon-content">
                                                <img class="icon" src="../images/TkPm63y.png">
                                                <div class="d-flex flex-column">
                                                    <p class="font-weight-bold text-white">Dispatched</p>
                                                </div>
                                            </div>
                                            <div class="row d-flex icon-content">
                                                <img class="icon" src="../images/HdsziHP.png">
                                                <div class="d-flex flex-column">
                                                    <p class="font-weight-bold text-white">Received</p>
                                                </div>
                                            </div>
                                            <div class="row d-flex icon-content">
                                                <img class="icon" src="../images/truck.png">
                                                <div class="d-flex flex-column">
                                                    <p class="font-weight-bold text-white">Delivered</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div> <!-- .content -->
        </div><!-- /#right-panel -->

        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Custom Search</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <form id="searchForm">
              <div class="form-group">
                  <input type="text" name="code" class="form-control">
              </div>

              <div class="form-group">
                  <input type="date" name="date" class="form-control">
              </div>
          </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary btn-sm" onclick="customSearch()">Search</button>

    </div>
</div>
</div>
</div>

<!-- Details Modal -->
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Parcel Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="card-title">Shipper (Sender)</div>
                    <table class="table">
                        <tr>
                         <td style="width: 30%">Name</td>
                         <td id="sender_name">:</td>
                     </tr>

                     <tr>
                         <td>Digital Address</td>
                         <td id="sender_address">:</td>
                     </tr>

                     <tr>
                         <td>Location Address</td>
                         <td id="sender_location">:</td>
                     </tr>

                     <tr>
                         <td>Telephone</td>
                         <td id="sender_telephone">:</td>
                     </tr>

                     <tr>
                         <td>Origin</td>
                         <td id="sender_origin">:</td>
                     </tr>
                 </table>
             </div>
             <div class="col-6">
                <div class="card-title">Shipper (Sender)</div>
                <table class="table">
                    <tr>
                     <td style="width: 30%">Name</td>
                     <td id="recipient_name">:</td>
                 </tr>

                 <tr>
                     <td>Digital Address</td>
                     <td id="recipient_address">:</td>
                 </tr>

                 <tr>
                     <td>Location Address</td>
                     <td id="recipient_location">:</td>
                 </tr>

                 <tr>
                     <td>Telephone</td>
                     <td id="recipient_telephone">:</td>
                 </tr>

                 <tr>
                     <td>Destination</td>
                     <td id="recipient_destination">:</td>
                 </tr>
             </table>
         </div>
     </div>
     <div class="row">
        <div class="col-12" style="border: none;">
            <div class="card-title">Local Parcel Detail</div>
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <td style="width: 30%">Service</td>
                            <td id="service_type">:</td>
                        </tr>

                        <tr>
                         <td>Parcel Type</td>
                         <td id="parcel_type">:</td>
                     </tr>

                     <tr>
                         <td>No of Items</td>
                         <td id="no_items">:</td>
                     </tr>

                     <tr>
                         <td>Weight</td>
                         <td id="weight">:</td>
                     </tr>

                     <tr>
                         <td>Amount</td>
                         <td id="amount">:</td>
                     </tr>
                 </table>
             </div>
             <div class="col-6">
                <table class="table">
                    <tr>
                        <td style="width: 30%">Content Description</td>
                        <td id="content_descr">:</td>
                    </tr>

                    <tr>
                     <td>Item Insured</td>
                     <td id="insurance">:</td>
                 </tr>

                 <tr>
                     <td>Value of Item</td>
                     <td id="value_of_item"></td>
                 </tr>

                 <tr>
                     <td>Data Created</td>
                     <td id="date_created">:</td>
                 </tr>

                 <tr>
                     <td>Created By</td>
                     <td id="created_by">:</td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
</div>

<div class="row">
    <div class="col-12" style="text-align: center;border: none;"></div>
    <div class="col-6">
        <table class="table">
            <tr>
                <td style="width: 30%">Parcel Code</td>
                <td id="parcel_code">:</td>
            </tr>

            <tr>
                <td>Manifest Code</td>
                <td id="manifest_code">:</td>
            </tr>
        </table>
    </div>
    <div class="col-6">
        <div id='qrcode' style='float:center;overflow: hidden;'></div>
    </div>
</div>

<div class="row">
    <div class="col-12" style="border: none;">
        <div class="card-title">Tracking Information</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Statement</th>
                </thead>
                <tbody id="track_body">

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<div class="modal-footer">
    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
    <button id="saveResultsBtn" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
</div>
</div>
</div>
</div>

<!-- .End Details Modal -->

<!-- Right Panel -->

<script src="../vendors/jquery/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/jquery/jquery-barcode.min.js"></script>
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
