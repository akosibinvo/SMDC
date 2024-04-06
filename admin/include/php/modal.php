<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="preconnect" href="https://fonts.gstatic.com">

   <link rel="shortcut icon" href="../img/icons/logo-square.png" />
   <link rel="shortcut icon" href="img/icons/logo-square.png" />
   <link rel="shortcut icon" href="../../img/icons/logo-square.png" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>

   <!-- Include Bootstrap Carousel JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>

   <!--======================================= ADD PRICE MODAL ======================================= -->
   <div class="modal fade" id="addPriceModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Booking Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">

               <div class="row mb-4">
                  <div class="form-group col-md-6">
                     <label class="form-label">Name</label>
                     <input class="form-control" type="text" name="firstname" id="firstname" disabled>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label">Unit Code</label>
                     <input class="form-control" type="text" name="unitcode" id="unitcode" disabled>
                  </div>
               </div>

               <div class="row mb-4">
                  <div class="form-group col-md-6">
                     <label class="form-label">Reservation Agreement</label>
                     <input class="form-control" type="file" name="ra" id="ra" disabled>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label">Holding</label>
                     <input class="form-control" type="file" name="holding" id="holding" disabled>
                  </div>
               </div>

               <div class="row mb-4">
                  <div class="form-group col-md-6">
                     <label class="form-label">Reservation Fee</label>
                     <input class="form-control" type="file" name="rf" id="rf" disabled>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label">ID (with Specimen)</label>
                     <input class="form-control" type="file" name="id" id="id" disabled>
                  </div>
               </div>

               <div class="row mb-4">
                  <div class="form-group col-md-6">
                     <label class="form-label">Date</label>
                     <input class="form-control" type="text" name="Transaction_date" id="Transaction_date" disabled>
                  </div>

                  <div class="form-group col-md-6">
                     <label class="form-label">Agent</label>
                     <input class="form-control" type="text" name="agent" id="agent" disabled>
                  </div>
               </div>

               <div class="row mb-4">
                  <div class="form-group col-md-6">
                     <label class="form-label">Status</label>
                     <input class="form-control" type="text" name="status" id="status" disabled>
                  </div>
               </div>


               <div class="modal-footer mt-5">
                  <button class="btn btn-primary" data-bs-target="#addPrice" data-bs-toggle="modal" data-bs-dismiss="modal">Add Price</button>
               </div>

            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="addPrice" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Price</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">

               <form action="../include/php/addPriceModal.php" method="post" enctype="multipart/form-data" class="px-2 needs-validation" novalidate>
                  <input type="hidden" name="addprice_id" id="addprice_id">

                  <div class="row mb-4">
                     <div class="form-group col-md-6">
                        <label class="form-label">Price</label>
                        <input class="form-control" type="text" name="amount" id="amount" placeholder="Enter numbers only" required>
                        <div class="invalid-feedback">
                           Invalid price format. Please enter a valid price without spaces.
                        </div>
                     </div>

                     <div class="form-group col-md-6">
                        <label class="form-label">Discount (%)</label>
                        <input class="form-control" type="text" name="discount" id="discount" placeholder="Enter discount" required>
                        <div class="invalid-feedback">
                           Please enter a discount.
                        </div>
                     </div>

                  </div>


                  <div class="modal-footer mt-5">
                     <button type="submit" name="addprice" class="btn btn-primary">Complete Booking</button>
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>

               </form>

            </div>
         </div>
      </div>
   </div>

   <!--======================================= VIEW CLIENT DETAILS MODAL ======================================= -->
   <div class="modal fade" id="viewDetailsModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Clients Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">

               <form action="" method="post" enctype="multipart/form-data" class="px-2">
                  <input type="hidden" name="viewdetails_id" id="viewdetails_id">

                  <div class="row mb-3">
                     <div class="form-group col-md-4">
                        <label class="form-label">First Name</label>
                        <input class="form-control mb-2" type="text" id="view_firstname" disabled>
                     </div>

                     <div class="form-group col-md-4">
                        <label class="form-label">Middle Name</label>
                        <input class="form-control mb-2" type="text" id="view_middlename" disabled>
                     </div>

                     <div class="form-group col-md-4">
                        <label class="form-label">Last Name</label>
                        <input class="form-control mb-2" type="text" id="view_lastname" disabled>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input class="form-control mb-2" type="date" id="view_birthdate" disabled>
                     </div>

                     <div class="form-group col-md-6">
                        <label class="form-label">Place of Birth</label>
                        <input class="form-control mb-2" type="text" id="view_birthplace" disabled>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-3">
                        <label class="form-label">Tin No:</label>
                        <input class="form-control mb-2" type="text" id="view_tin" disabled>
                     </div>

                     <div class="form-group col-md-3">
                        <label class="form-label">Gender</label>
                        <input class="form-control mb-2" type="text" id="view_gender" disabled>
                     </div>

                     <div class="form-group col-md-3">
                        <label class="form-label">Civil Status</label>
                        <input class="form-control mb-2" type="text" id="view_civil" disabled>
                     </div>

                     <div class="form-group col-md-3">
                        <label class="form-label">Citizenship</label>
                        <input class="form-control mb-2" type="text" id="view_citizenship" disabled>
                     </div>

                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-4">
                        <label class="form-label">Email</label>
                        <input class="form-control mb-2" type="text" id="view_email" disabled>
                     </div>

                     <div class="form-group col-md-4">
                        <label class="form-label">Phone No:</label>
                        <input class="form-control mb-2" type="text" id="view_phone" disabled>
                     </div>

                     <div class="form-group col-md-4">
                        <label class="form-label">Passport No:</label>
                        <input class="form-control mb-2" type="text" id="view_passport" disabled>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-6">
                        <label class="form-label">Present Address</label>
                        <textarea class="form-control non-resizable mb-2" id="view_presentAddress" rows="2" disabled></textarea>
                     </div>

                     <div class="form-group col-md-6">
                        <label class="form-label">Permanent Address</label>
                        <textarea class="form-control non-resizable mb-2" id="view_permanentAddress" rows="2" disabled></textarea>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-6">
                        <label class="form-label">Employer Name</label>
                        <input class="form-control mb-2" type="text" id="view_employer" disabled>
                     </div>

                     <div class="form-group col-md-6">
                        <label class="form-label">Work Address</label>
                        <textarea class="form-control non-resizable mb-2" id="view_workAddress" rows="1" disabled></textarea>
                     </div>
                  </div>


                  <div class="modal-footer mt-3">
                     <!-- <button type="submit" name="addprice" class="btn btn-primary">Complete Booking</button> -->
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>

               </form>

            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= EDIT PROFILE MODAL ======================================= -->
   <div class="modal fade" id="editProfileDetails" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="../admin/include/php/edit-profile-details.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="update_id" id="update_id">
                  <div class="row">
                     <div class="col-sm-12 col-md-12">
                        <div class="form-group text-center mb-0 p-4">
                           <?php
                           $sql_profile = "SELECT img FROM users WHERE ID = '$user_id'";
                           $res_profile = mysqli_query($conn, $sql_profile);
                           if ($res_profile && mysqli_num_rows($res_profile) > 0) {
                              $row = mysqli_fetch_assoc($res_profile);
                              $profile_img_path = $row['img'];
                              if (!empty($profile_img_path)) {
                                 $profile_img_path = "../img/avatars/users/" . $profile_img_path;
                              } else {
                                 $profile_img_path = "../img/avatars/default/default-profile-blue.png";
                              }
                           } else {
                              $profile_img_path = "../img/avatars/default/default-profile-blue.png";
                           }
                           ?>
                           <img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle mb-3" id="userimagePreview" width="205" height="205" />
                        </div>

                        <div class="form-group text-center mt-0 mb-3 d-flex align-items-center justify-content-center">
                           <input type="file" name="profilePic" id="userfileInput" style="display: none;" accept=".png, .jpg, .jpeg" onchange="checkFile()">
                           <label for="userfileInput" class="upload_photo btn btn-primary p-2 mb-4" title="Add Photo">
                              <i class="align-middle" data-feather="plus"></i>
                              Upload Photo
                           </label>

                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="mt-3">
                        <button type="submit" name="update" id="userupdateButton" class="btn btn-primary" disabled>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= EDIT ACCOUNT DETAILS MODAL ======================================= -->
   <div class="modal fade" id="editAccountDetails" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit Account Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <form action="../admin/include/php/edit-account-details.php" method="post" enctype="multipart/form-data" id="editDetailsForm">
                  <input type="hidden" name="update_profile_id">

                  <div class="row mb-3">

                     <?php
                     $sql_profile = "SELECT * FROM users WHERE ID = '$id'";
                     $res_profile = mysqli_query($conn, $sql_profile);

                     if ($res_profile && mysqli_num_rows($res_profile) > 0) {
                        $row = mysqli_fetch_assoc($res_profile);
                        $profile_firstname = $row['firstName'];
                        $profile_lastname = $row['lastName'];
                        $profile_join = $row['dateJoined'];
                        $profile_contact = $row['contactNo'];
                     } else {
                     }

                     ?>

                     <div class="col-sm-12 col-md-12 px-4">
                        <div class="row mb-3">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="firstname">Firstname</label>
                              <input class="form-control" type="text" pattern="[A-Za-z\s]+" name="profile_firstname" id="profile_firstname" value="<?php echo $profile_firstname ?>">
                           </div>

                           <div class="form-group col-md-6">
                              <label class="form-label">Lastname</label>
                              <input class="form-control" type="text" pattern="[A-Za-z\s]+" name="profile_lastname" id="profile_lastname" value="<?php echo $profile_lastname ?>">
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label">Contact No.</label>
                              <input class="form-control" type="text" name="profile_contact" id="profile_contact" pattern="[0-9]*" value="<?php echo $profile_contact ?>">
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label">Date Joined</label>
                              <input class="form-control" type="text" name="profile_join" value="<?php echo $profile_join ?>" readonly>
                           </div>
                        </div>

                     </div>


                  </div>



                  <div class="modal-footer">
                     <div class="mt-3">
                        <button type="submit" name="update_profile" class="btn btn-primary" id="updateDetails">Update</button>
                     </div>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= MANAGE SELLERS EDIT MODAL ======================================= -->
   <div class="modal fade" id="manageSellersModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Manage Sellers</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <form action="../include/php/edit-sellers.php" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="update_id" id="update_sellers_id">

                  <div class="row mb-0">

                     <div class="form-group col-md-6 mb-2">
                        <label class="form-label">First Name</label>
                        <input class="form-control mb-2" type="text" id="manage_edit_firstname" disabled>
                     </div>

                     <div class="form-group col-md-6 mb-2">
                        <label class="form-label">Last Name</label>
                        <input class="form-control mb-2" type="text" id="manage_edit_lastname" disabled>
                     </div>

                  </div>

                  <div class="row mb-0">
                     <div class="form-group col-md-12  mb-2">
                        <label class="form-label">E-mail</label>
                        <input class="form-control mb-2" type="text" id="manage_edit_email" disabled>
                     </div>


                  </div>

                  <div class="row mb-3">
                     <div class="form-group col-md-6 mb-2">
                        <label class="form-label">Date Joined</label>
                        <input class="form-control mb-2" type="text" id="manage_edit_date" disabled>
                     </div>

                     <div class="form-group col-md-6 mb-2">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="sellersRole" id="manage_edit_role">
                           <option value="SA1">SA1</option>
                           <option value="SA2">SA2</option>
                           <option value="IMP">IMP</option>
                        </select>
                     </div>
                  </div>


                  <div class="modal-footer mt-4 mb-n2">
                     <div class="gap-2">
                        <button type="submit" name="updateSellers" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= REJECT BOOKING MODAL ======================================= -->
   <div class="modal fade" id="rejectBookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to remove? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/reject-booking.php" method="POST">
                  <input type="hidden" name="reject_id" id="reject_id">
                  <button type="submit" name="reject" class="btn btn-danger"> Remove </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DELETE ARCHIVES MODAL ======================================= -->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to remove? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/delete-booking.php" method="POST">
                  <input type="hidden" name="delete_id" id="delete_id">
                  <button type="submit" name="delete" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DELETE ALL ARCHIVES MODAL ======================================= -->
   <div class="modal fade" id="clearArchivesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to delete all? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/delete-all-archives.php" method="POST">
                  <input type="hidden" name="clear_all_id" id="clear_all_id">
                  <button type="submit" name="clear_all" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= NAVBAR LOGOUT MODAL ======================================= -->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to log out? </p>
            </div>
            <div class="modal-footer">
               <form action="../php/logout.php" method="POST">
                  <input type="hidden" name="logout_id" id="logout_id">
                  <button type="submit" name="logout" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= INDEX LOGOUT MODAL ======================================= -->
   <div class="modal fade" id="indexlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to log out? </p>
            </div>
            <div class="modal-footer">
               <form action="php/logout.php" method="POST">
                  <input type="hidden" name="index_logout_id" id="index_logout_id">
                  <button type="submit" name="logout" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= ADMIN INDEX LOGOUT MODAL ======================================= -->
   <div class="modal fade" id="adminlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to log out? </p>
            </div>
            <div class="modal-footer">
               <form action="../php/logout.php" method="POST">
                  <input type="hidden" name="index_logout_id" id="index_logout_id">
                  <button type="submit" name="logout" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= ADMIN NAVBAR LOGOUT MODAL ======================================= -->
   <div class="modal fade" id="adminNavlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to log out? </p>
            </div>
            <div class="modal-footer">
               <form action="../../php/logout.php" method="POST">
                  <input type="hidden" name="logout_id" id="logout_id">
                  <button type="submit" name="logout" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= CONGRATULATIONS SA1 MODAL ======================================= -->
   <div class="modal fade" id="congratsSA1Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-body text-center border-0">
               <img src="../img/icons/congrats.png" alt="Congratulation Image" width="150" height="150">
               <p class="fs-3 fw-bold mb-2"> Congratulations on achieving S2 status! </p>
               <p class="mb-0"> Keep up the exceptional work, and may this milestone be just the beginning of even greater achievements ahead. Well done! </p>

            </div>
            <div class="modal-footer border-0 mx-auto mt-0 mb-3">
               <form action="../admin/include/php/update-SA1-status.php" method="POST">
                  <input type="hidden" name="congrats_SA1_id">
                  <button type="submit" name="congrats_SA1" class="btn btn-primary background-blue"> Update Status </button>
               </form>
               <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button> -->
            </div>
         </div>
      </div>
   </div>

   <!--======================================= CONGRATULATIONS SA2 MODAL ======================================= -->
   <div class="modal fade" id="congratsSA2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-body text-center border-0">
               <img src="../img/icons/congrats.png" alt="Congratulation Image" width="150" height="150">
               <p class="fs-3 fw-bold mb-2"> Congratulations on achieving IMP status! </p>
               <p class="mb-0"> Keep up the exceptional work, and may this milestone be just the beginning of even greater achievements ahead. Well done! </p>

            </div>
            <div class="modal-footer border-0 mx-auto mt-0 mb-3">
               <form action="../admin/include/php/update-SA2-status.php" method="POST">
                  <input type="hidden" name="congrats_SA2_id">
                  <button type="submit" name="congrats_SA2" class="btn btn-primary background-blue"> Update Status </button>
               </form>
               <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button> -->
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DELETE NOTIFICATIONS MODAL ======================================= -->
   <div class="modal fade" id="deleteNotificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to delete? </p>
            </div>
            <div class="modal-footer">
               <form action="../admin/include/php/delete-notification.php" method="POST">
                  <input type="hidden" name="delete_notif_id" id="delete_notif_id">
                  <button type="submit" name="delete_notif" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DELETE ALL NOTIFICATIONS MODAL ======================================= -->
   <div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to delete all? </p>
            </div>
            <div class="modal-footer">
               <form action="../admin/include/php/delete-all-notification.php" method="POST">
                  <input type="hidden" name="delete_all_id" id="delete_all_id">
                  <button type="submit" name="delete_all" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= RESTORE CONFIRMATION MODAL ======================================= -->
   <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to restore this data? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/restore-booking.php" method="POST">
                  <input type="hidden" name="restore_id" id="restore_id">
                  <button type="submit" name="restore" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= REMOVE SELLERS MODAL ======================================= -->
   <div class="modal fade" id="removeSellersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to remove? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/remove-sellers.php" method="POST">
                  <input type="hidden" name="remove_sellers_id" id="remove_sellers_id">
                  <button type="submit" name="remove_sellers" class="btn btn-danger"> Remove </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= REMOVE CLIENTS INFORMATION MODAL ======================================= -->
   <div class="modal fade" id="removeInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to remove? </p>
            </div>
            <div class="modal-footer">
               <form action="../admin/include/php/remove-client-info.php" method="POST">
                  <input type="hidden" name="remove_info_id" id="remove_info_id">
                  <button type="submit" name="remove_info" class="btn btn-danger"> Remove </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= ASSIGN TEAM MODAL ======================================= -->
   <div class="modal fade" id="assignTeamModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Manage Sellers</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <form action="../include/php/assign-team.php" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="assign_id" id="assign_id">

                  <div class="row mb-3">

                     <div class="form-group col-md-12 mb-2">
                        <label class="form-label">List of IMPs</label>

                        <select class="form-select" name="assignTeam" required>
                           <option value=""> Select IMP </option>

                           <?php
                           $sql_imp = "SELECT * FROM users WHERE role = 'IMP' ";
                           $res_imp = mysqli_query($conn, $sql_imp);

                           if ($res_imp) {
                              while ($row = mysqli_fetch_assoc($res_imp)) {
                                 $fname = $row['firstName'];
                                 $lname = $row['lastName'];
                                 $team_id = $row['team_id'];
                                 $imp_fullname = $fname . ' ' . $lname;

                                 echo "<option value='$team_id'>$imp_fullname</option>";
                              }
                           }
                           ?>

                        </select>

                     </div>

                  </div>

                  <div class="modal-footer mt-4 mb-n2">
                     <div class="gap-2">
                        <button type="submit" name="assignTeambtn" class="btn btn-primary">Assign</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>


   <!--======================================= VIEW TEAMS MODAL ======================================= -->
   <div class="modal fade border-0" id="teamModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content border-0">
            <div class="modal-header bg-blue">
               <h5 class="modal-title text-white" id="exampleModalLabel">Team Members</h5>
               <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button> -->
            </div>
            <div class="modal-body p-2">
               <div class="team-content px-2">
                  <input type="hidden" name="team_id" id="team_id">
                  <div class="row mb-3 ">
                     <div id="team_information">

                     </div>
                  </div>
                  <div class="modal-footer mt-n2 mb-n2">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>


   <!--======================================= REMOVE MEMBER CONFIRMATION MODAL ======================================= -->
   <div class="modal fade" id="removeTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to remove the member? </p>
            </div>
            <div class="modal-footer">
               <form action="../include/php/remove_member.php" method="POST">

                  <input type="hidden" id="hiddenTeamMemberId" name="team_remove_id" value="">

                  <button type="submit" name="team_remove" class="btn btn-primary"> Yes </button>
               </form>
               <button type="button" class="btn btn-danger" data-bs-target="#teamModal" data-bs-toggle="modal" data-bs-dismiss="modal"> No </button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= GET STARTED MODAL ======================================= -->
   <div class="modal fade" id="getStartedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content p-2">
            <div class="modal-header border-0 m-0">
               <h4 class="modal-title fw-bold mb-3">Welcome to SMDC JQB</h4>
            </div>
            <form action="admin/include/php/unset-get-started.php" method="POST">
               <div class="modal-body mt-0">

                  <div class="modal-image mt-n3 mb-3">
                     <img src="img/bg/welcomes.png" alt="Modal Image">
                  </div>

                  <p class="mb-0"> Feel like getting started in 15 minutes or less? We've put together a step-by-step guide, which covers everything you need to get going! </p>

               </div>
               <div class="modal-footer border-0 mt-0">

                  <button type="submit" class="btn custom-no-border" name="unset_get_started"> No, thanks </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#steps"> Get started </button>

               </div>
            </form>
         </div>
      </div>
   </div>
   </div>

   <!--======================================= STEPS MODAL ======================================= -->
   <div class="modal fade" id="steps" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content p-2">
            <form action="admin/include/php/unset-get-started.php" method="POST">
               <div class="carousel slide p-2" data-bs-ride="false" id="carouselExampleIndicators">

                  <div class="modal-body mt-0 p-0" style="height: 330px">
                     <div class="carousel-inner">

                        <div class="carousel-item active">
                           <div class="modal-header border-0 p-0">
                              <h4 class="modal-title fw-bold mb-3">Dashboard Overview</h4>
                           </div>

                           <div class="modal-image mb-3">
                              <img src="img/bg/dash.png" alt="Modal Image" class="d-block">
                           </div>
                           <p class="mb-0"> This is your central hub for managing all aspects of your condominium bookings. From here, you'll get an overview of your current bookings, availability, and any upcoming events or promotions. </p>
                        </div>

                        <div class="carousel-item">
                           <div class="modal-header border-0 p-0">
                              <h4 class="modal-title fw-bold mb-3">Statistics</h4>
                           </div>

                           <div class="modal-image mb-3">
                              <img src="img/bg/stats.png" alt="Modal Image" class="d-block">
                           </div>
                           <p class="mb-0"> Dive into detailed statistics and insights about your bookings and sales performance. Track your revenue, occupancy rates, and popular booking trends to optimize your sales strategy.</p>
                        </div>

                        <div class="carousel-item">
                           <div class="modal-header border-0 p-0">
                              <h4 class="modal-title fw-bold mb-3">Notifications</h4>
                           </div>

                           <div class="modal-image mb-3">
                              <img src="img/bg/notif.png" alt="Modal Image" class="d-block">
                           </div>
                           <p class="mb-0"> Stay informed about approved bookings from admin. Notifications will appear here, ensuring you never miss a beat. </p>
                        </div>

                        <div class="carousel-item">
                           <div class="modal-header border-0 p-0">
                              <h4 class="modal-title fw-bold mb-3">Sales</h4>
                           </div>

                           <div class="modal-image mb-3">
                              <img src="img/bg/sale.png" alt="Modal Image" class="d-block">
                           </div>
                           <p class="mb-0"> Manage your bookings efficiently with our Sales page. Here, you can view and update booking details, confirm reservations, and generate invoices for clients. </p>
                        </div>

                        <div class="carousel-item">
                           <div class="modal-header border-0 p-0">
                              <h4 class="modal-title fw-bold mb-3">Profile</h4>
                           </div>

                           <div class="modal-image mb-3">
                              <img src="img/bg/prof.png" alt="Modal Image" class="d-block">
                           </div>
                           <p class="mb-0"> Your Profile page is where you can manage your personal information, including contact details, payment preferences, and profile picture. Keeping your profile up-to-date ensures smooth communication with clients. </p>
                        </div>

                     </div>


                  </div>

                  <div class="carousel-indicators" style="bottom: -15%; position: absolute;">
                     <button style="background-color: #0030ff" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                     <button style="background-color: #0030ff;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                     <button style="background-color: #0030ff;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                     <button style="background-color: #0030ff;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                     <button style="background-color: #0030ff;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  </div>


               </div>

               <div class="modal-footer border-0 mt-4">
                  <button type="submit" class="btn custom-no-border" name="unset_get_started"> Skip </button>
                  <button type="submit" class="btn btn-primary" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" id="nextButton"> Next </button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- ======================================= EDIT ADMIN PROFILE MODAL ======================================= -->
   <div class="modal fade" id="editAdminProfileDetails" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="../include/php/edit-admin-profile.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="admin_update_id" id="admin_update_id">
                  <div class="row">
                     <div class="col-sm-12 col-md-12">
                        <div class="form-group text-center mb-0 p-4">
                           <?php
                           $sql_profile = "SELECT img FROM admin_account WHERE admin_id = '$admin_id'";
                           $res_profile = mysqli_query($conn, $sql_profile);
                           if ($res_profile && mysqli_num_rows($res_profile) > 0) {
                              $row = mysqli_fetch_assoc($res_profile);
                              $profile_img_path = $row['img'];
                              if (!empty($profile_img_path)) {
                                 $profile_img_path = "../../img/avatars/admin/" . $profile_img_path;
                              } else {
                                 $profile_img_path = "../../img/avatars/default/default-profile-blue.png";
                              }
                           } else {
                              $profile_img_path = "../../img/avatars/default/default-profile-blue.png";
                           }
                           ?>
                           <img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle mb-3" id="adminImagePreview" width="205" height="205" />
                        </div>

                        <div class="form-group text-center mt-0 mb-3 d-flex align-items-center justify-content-center">
                           <input type="file" name="profilePic" id="AdminfileInput" style="display: none;" accept=".png, .jpg, .jpeg" onchange="admincheckFile()">
                           <label for="AdminfileInput" class="upload_photo btn btn-primary p-2 mb-4" title="Add Photo">
                              <i class="align-middle" data-feather="plus"></i>
                              Upload Photo
                           </label>

                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="mt-3">
                        <button type="submit" name="admin_update" id="updateAdminButton" class="btn btn-primary" disabled>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>


   <script>
      $(document).ready(function() {
         $('#steps').on('slid.bs.carousel', function() {
            var currentIndex = $('div.active').index();
            var totalItems = $('.carousel-inner').children().length;

            if (currentIndex === totalItems - 1) {
               $('#nextButton').text('Finish')
                  .removeAttr('data-bs-target')
                  .removeAttr('data-bs-slide')
                  .attr('name', 'unset_get_started')

            } else {
               $('#nextButton').text('Next')
                  .attr('data-bs-target', '#carouselExampleIndicators')
                  .attr('data-bs-slide', 'next');
            }
         });
      });
   </script>

   <script>
      // Function to add commas to the input value for every three digits
      function addCommas(input) {
         // Check if input starts with the peso sign (₱)
         let startsWithPeso = input.value.startsWith('₱');

         // Remove all non-numeric characters and the peso sign
         let value = input.value.replace(/[^0-9]/g, '');

         // Add commas every three digits
         value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

         // Add the peso sign back with a space if it was originally present
         if (startsWithPeso) {
            value = '₱' + ' ' + value;
         }

         // Set the input value with commas
         input.value = value;
      }

      // Get the input element
      const amountInput = document.getElementById('amount');

      // Add event listener for input
      amountInput.addEventListener('input', function() {
         // Call function to add commas
         addCommas(this);
      });
   </script>

   <script>
      (function() {
         'use strict'

         var forms = document.querySelectorAll('.needs-validation')

         Array.prototype.slice.call(forms)
            .forEach(function(form) {
               form.addEventListener('submit', function(event) {
                  if (!form.checkValidity()) {
                     event.preventDefault()
                     event.stopPropagation()
                  }

                  form.classList.add('was-validated')
               }, false)
            })
      })()
   </script>

   <!-- EDIT PROFILE FOR USERS -->
   <script>
      const fileInput = document.getElementById('userfileInput');
      const imagePreview = document.getElementById('userimagePreview');

      fileInput.addEventListener('change', function(event) {
         const file = event.target.files[0];
         const reader = new FileReader();

         reader.onload = function(e) {
            imagePreview.src = e.target.result;
         };

         reader.readAsDataURL(file);
      });
   </script>

   <script>
      function checkFile() {
         var fileInput = document.getElementById('userfileInput');
         var updateButton = document.getElementById('userupdateButton');
         if (fileInput.files.length > 0) {
            updateButton.disabled = false;
         } else {
            updateButton.disabled = true;
         }
      }
   </script>


   <!-- EDIT PROFILE FOR ADMIN -->
   <script>
      const adminfileInput = document.getElementById('AdminfileInput');
      const adminImagePreview = document.getElementById('adminImagePreview');

      adminfileInput.addEventListener('change', function(event) {
         const file = event.target.files[0];
         const reader = new FileReader();

         reader.onload = function(e) {
            adminImagePreview.src = e.target.result;
         };

         reader.readAsDataURL(file);
      });
   </script>

   <script>
      function admincheckFile() {
         var fileInput = document.getElementById('AdminfileInput');
         var updateAdminButton = document.getElementById('updateAdminButton');
         if (fileInput.files.length > 0) {
            updateAdminButton.disabled = false;
         } else {
            updateAdminButton.disabled = true;
         }
      }
   </script>

   <script>
      $(document).ready(function() {
         // Get initial values
         var initialValues = {
            profile_firstname: $('#profile_firstname').val(),
            profile_lastname: $('#profile_lastname').val(),
            profile_contact: $('#profile_contact').val(),
         };

         // Function to check if there are changes
         function checkChanges() {
            var currentValues = {
               profile_firstname: $('#profile_firstname').val(),
               profile_lastname: $('#profile_lastname').val(),
               profile_contact: $('#profile_contact').val(),
            };

            return JSON.stringify(initialValues) === JSON.stringify(currentValues);
         }

         // Disable the button if there are no changes
         $('#editDetailsForm input').on('input', function() {
            if (checkChanges()) {
               $('#updateDetails').prop('disabled', true);
            } else {
               $('#updateDetails').prop('disabled', false);
            }
         });

         // Initially disable the button if there are no changes
         if (checkChanges()) {
            $('#updateDetails').prop('disabled', true);
         }
      });
   </script>




</body>

</html>