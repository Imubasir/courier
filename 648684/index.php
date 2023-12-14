<?php
session_start();
if(!$_SESSION['username']) {
    header('Location:../');
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
            <!--[if gt IE 8]><!-->
                <html class="no-js" lang="en">
                <!--<![endif]-->

                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>Courier | Profile</title>
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
                                            <h6>Profile</h6>
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

                                    <div class="row" style="box-shadow: 1px 1px 9px 2px #3b40741f;padding: 20px;background: azure;">
                                        <div class="col-3" style="text-align: center;">
                                          <div>
                                            <img src="" id="profile_image" style="border-radius: 50%;border: 1px outset #ffffff00;box-shadow: 0px 1px 6px 5px #aeb5e959;" width="150px;">
                                        </div>
                                        <br>

                                        <h3 id="staff_name"></h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-6"><label>Station</label></div>
                                            <div class="col-6 left-align" id="station"></div>
                                        </div> 
                                        <br>
                                        <div class="row">
                                            <div class="col-6"><label>Role</label></div>
                                            <div class="col-6 left-align" id="role"></div>
                                        </div> 
                                        <br>
                                        <div class="row">
                                            <div class="col-6"><label>Last Login</label></div>
                                            <div class="col-6 left-align" id="last_login"></div>
                                        </div> 


                                    </div>
                                    <div class="col-5">
                                      <form id="updateLoginForm">
                                        <div class="form-group">
                                          <a href="#!" data-toggle="modal" data-target="#imageChanger"><i class="mdi mdi-image-area-close">Change Image</i></a>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col-6">
                                              <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                                          </div>
                                          <div class="col-6">
                                              <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name Name">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <input type="text" id="email" name="username" class="form-control" readonly>
                                      </div>

                                      <div class="form-check form-check-success">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkPassword">
                                            Click Here to Update Password
                                        </label>
                                    </div>
                                    <br>
                                    <div id="paswd_div" style="display: none;">
                                      <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="staff_password" name="staff_password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" id="staff_confirmPassword" name="staff_confirmPassword" class="form-control">
                                    </div>
                                </div>

                            </form>
                            <button class="btn btn-md btn-info" onclick="updateLogin()">Save</button>
                        </div>
                    </div>
                    <!--/.row-->

                    <!-- Change Modal -->
                    <div class="modal fade" id="imageChanger">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Change Profile Picture</h4>
                            <button class="btn btn-inverse-secondary btn-fw close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form id="image_form" class="forms-sample">

                          <div class="form-group">
                            <input type="file" class="form-control form-control-sm" name="file" id="file">
                        </div>       
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" onclick="imageChanger()">Change </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End of Change -->
</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/toastr-master/build/toastr.min.js"></script>
<script src="../js/access.js"></script>

<script src="../vendors/jquery-validation-1.19.5/dist/jquery.validate.js"></script>
<script src="../vendors/jquery/jquery-barcode.min.js"></script>
<script src="../vendors/countup/jquery.countupcircle.js"></script>

<script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="../assets/js/dashboard.js"></script>

<script src="../js/function.js"></script>
<script src="../assets/js/print.js"></script>
<script src="function.js"></script>

</body>

</html>
