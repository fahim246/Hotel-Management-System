<?php
session_start();
if ($_SESSION['owner_code']) {
  include_once('connect.php');
  include('includes/header.php'); 
  include('includes/navbar.php'); 
} else{
  header('location:login.php');
}

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-suitcase-rolling fa-1x text-gray-300"></i> CheckOut</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Rooms Booked</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4>
                 <?php 
                 $a = 0;
              $owner_name = $_SESSION['owner_name'] ;
              $sql1 = "select * from hotel_data where owner_name='$owner_name' ";
              $result1=mysqli_query($conn,$sql1);
              while ( $row1 = $result1->fetch_assoc()) : ?>
                <?php
              $sql = "select * from room_booking where hotel_name='$row1[hotel_name]' and status='confirmed'";
              $result=mysqli_query($conn,$sql);
              while ($row = $result->fetch_assoc()) : ?>
                   <?php $a = $a+1; ?>
                <?php endwhile; ?>
                <?php endwhile; ?>
                <?php echo  $a; ?>
               </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-bed fa-2x text-gray-300"></i>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Halls Booked</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h4>
                  
                </h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-landmark fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>