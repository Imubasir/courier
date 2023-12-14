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
    <title>Courier | Users</title>
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
    <!-- <link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css"> -->

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_css.css">
    <link rel="stylesheet" href="toggle.css">

    <style type="text/css">
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            background-color: #ffffff40;
        }

        .toggle_label_dis {
            background-color: #bd213073;
            padding: 5px;
            border-radius: 5px;
        }

        .toggle_label_act {
            background-color: #21bd2d73;
            padding: 5px;
            border-radius: 5px;
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
                                <li id="users" class="_active"><i class="fa fa-user"></i>
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
                        <h6>Branches</h6>
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
                <div class="card" id="userList">
                    <!-- <div class="card-title">List of Users</div> -->
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background: #17a2b8;padding: 15px;margin-top: -3%;">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true" style="border: none;color: white;" onclick="loadUsers()">System Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="false" style="border: none;color: white;" onclick="loadRequests()">Account Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account"
                            aria-selected="false" style="border: none;color: white;">Create Account</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="user_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Access Group</th>
                                        <th>Branch</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="user_body">

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="list_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Access Group</th>
                                        <th>Branch</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="list_body">

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <div style="width: 50%;margin-left: 20%;width: 60%;padding: 20px;box-shadow: 2px 2px 9px 1px #efeeee;">
                            <form id="account_form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Picture
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Branch
                                        </div>
                                        <div class="col-6">
                                            <select class="form-control" name="branch">
                                                <option selected disabled>Select Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            First Name
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="fname" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Last Name
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Email
                                        </div>
                                        <div class="col-6">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Password
                                        </div>
                                        <div class="col-6">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            Confirm Password
                                        </div>
                                        <div class="col-6">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-3">

                                </div>
                                <div class="col-6">
                                    <button class="btn btn-sm btn-success" onclick="addUser()"><i class="fa fa-save"></i> Create Account</button>
                                    <button class="btn btn-sm btn-danger">Reset</button>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!--/.row-->
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Access Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Access</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">
    <form id="accessForm">

      <div class="form-group">
          <select class="form-control custom-select" name="user_group">
              <option selected disabled>User Group</option>
          </select>
      </div>
      <br>
      <div class="form-group">
        <label>Login Status: </label>
        <label class="switch">
          <input type="checkbox" name="userLogin_status">
          <span class="slider round"></span>
      </label>
  </div>
</form>
</div>

<div class="modal-footer">
    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
    <button id="delRequest" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
    <button id="accessBtn"  class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>
</div>
</div>
</div>
</div>
<!-- End Access Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Edit User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">
        <form id="edit_form">
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        Picture
                    </div>
                    <div class="col-5">
                        <input type="file" name="edit_image" class="form-control">
                    </div>
                    <div class="col-3">
                        <img class="user-avatar rounded-circle" id="edit_image" src="" style="width: 30px;height: 30px;" alt="Image">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        Branch
                    </div>
                    <div class="col-8">
                        <select class="form-control" name="edit_branch">
                            <option selected disabled>Select Branch</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        First Name
                    </div>
                    <div class="col-8">
                        <input type="text" name="edit_fname" class="form-control" placeholder="First Name">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        Last Name
                    </div>
                    <div class="col-8">
                        <input type="text" name="edit_lname" class="form-control" placeholder="Last Name">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        Email
                    </div>
                    <div class="col-8">
                        <input type="email" name="edit_email" class="form-control" placeholder="Email" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        Select User Group
                    </div>
                    <div class="col-8">
                        <select class="form-control custom-select" name="edit_user_group">
                          <option selected disabled>User Group</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Login Status: </label>
                </div>
                <div class="col-8">
                    <label class="switch">
                      <input type="checkbox" name="edit_userLogin_status">
                      <span class="slider round"></span>
                  </label>
              </div>

          </div>


      </div>


  </form>
</div>

<div class="modal-footer">
    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
    <button id="delUser" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
    <button class="btn btn-primary btn-sm" id="saveBtn" onclick="saveEdit()"><i class="fa fa-save"></i> Save</button>
</div>
</div>
</div>
</div>
<!-- End Access Modal -->
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

<script src="../assets/js/jszip.min.js"></script>
<script src="../assets/js/pdfmake.min.js"></script>
<script src="../assets/js/vfs_fonts.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>

<script src="../js/function.js"></script>
<script src="function.js"></script>
<script type="text/javascript">
    keep_open("keep-open,index");
</script>
</body>

</html>