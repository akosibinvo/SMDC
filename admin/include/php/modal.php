<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="preconnect" href="https://fonts.gstatic.com">

      <link rel="shortcut icon" href="../img/icons/logo-square.png" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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

               <form action="../include/php/addPriceModal.php" method="post" enctype="multipart/form-data" class="px-2 needs-validation" novalidate>
                     <input type="hidden" name="addprice_id" id="addprice_id">

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
                        <input class="form-control" type="file" name="ra" id="rf" disabled>
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

                     <div class="form-group col-md-6">
                           <label class="form-label">Price</label>
                           <input class="form-control" type="text" name="amount" id="amount" placeholder="Enter numbers only" required>
                           <div class="invalid-feedback">
                              Invalid price format. Please enter a valid price without spaces.
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

      <!-- ======================================= EDIT MODAL ======================================= -->
      <div class="modal fade" id="profileModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                  <form action="../admin/include/php/imgUpload.php" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="update_id" id="update_id">

                     <div class="row mb-3">

                     <div class="col-sm-6 col-md-6">
                        <div class="form-group text-center mb-3 p-4">
                        <img src="../img/avatars/default-profile-blue.png" alt="Default Profile" class=" rounded-circle mb-3" id="imagePreview" width="205" height="205" style="object-fit: cover;" />

                        <input class="form-control mt-3" type="file" name="profilePic" id="fileInput" required>
                        </div>
                     </div>

                     <div class="col-sm-6 col-md-6 px-4">
                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label" for="firstname">Firstname</label>
                              <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter first name">
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label">Lastname</label>
                              <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter first name">
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label">E-mail</label>
                              <input class="form-control" type="text" name="email" id="email" placeholder="Enter first name">
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group mb-3">
                              <label class="form-label">Password</label>
                              <input class="form-control" type="text" name="password" id="password" placeholder="Enter first name">
                           </div>
                        </div>
                        
                     </div>
                        

                     </div>

                     

                     <div class="modal-footer">
                        <div class="gap-2 mt-4">
                           <button type="submit" name="update" class="btn btn-primary">Update</button>
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>

    

      <!--======================================= DELETE MODAL ======================================= -->
      <div class="modal fade" id="rejectBookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form action="../include/php/rejectBooking.php" method="POST">
                     <input type="hidden" name="delete_id" id="delete_id">
                     <button type="submit" name="delete" class="btn btn-danger"> Delete </button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      
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
         (function () {
         'use strict'
         
         var forms = document.querySelectorAll('.needs-validation')

         Array.prototype.slice.call(forms)
            .forEach(function (form) {
               form.addEventListener('submit', function (event) {
               if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
               }

               form.classList.add('was-validated')
               }, false)
            })
         })()
      </script>

      <script>
         const fileInput = document.getElementById('fileInput');
         const imagePreview = document.getElementById('imagePreview');

         fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                  imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
         });
      </script>

   </body>
</html>