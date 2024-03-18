<?php

require "../backend/connection.php";
include "addProject.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="shortcut icon" href="img/icons/logo.png" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

   <!--======================================= POSITION MODAL ======================================= -->
   <div class="modal fade" id="addProjectModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">

               <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                     <label class="form-label">Project Name</label>
                     <input class="form-control" type="text" name="projectName" placeholder="Enter project name" required>
                  </div>

                  <div class="form-group mb-3">
                     <label class="form-label">Unit Code</label>
                     <input class="form-control" type="text" name="unitCode" placeholder="Enter unit code" required>
                  </div>

                  <div class="modal-footer mt-5">
                     <button type="submit" name="submit" class="btn btn-primary">Add Project</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>

               </form>

            </div>
         </div>
      </div>
   </div>



   <!--======================================= DELETE MODAL ======================================= -->
   <div class="modal fade" id="deleteCandidate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
               <form action="include/deleteCandidate.php" method="POST">
                  <input type="hidden" name="candidate_id" id="candidate_id">
                  <button type="submit" name="deleteCandidate" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DENY MODAL ======================================= -->
   <div class="modal fade" id="denyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <p> Are you sure you want to deny the account? </p>
            </div>
            <div class="modal-footer">
               <form action="include/denyVoters.php" method="POST">
                  <input type="hidden" name="deny_id" id="deny_id">
                  <button type="submit" name="denydata" class="btn btn-danger"> Deny </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= DELETE POSITION MODAL ======================================= -->
   <div class="modal fade" id="deletePosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
               <form action="include/deletePosition.php" method="POST">
                  <input type="hidden" name="position_id" id="position_id">
                  <button type="submit" name="deletePosition" class="btn btn-danger"> Delete </button>
               </form>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= TITLE MODAL ======================================= -->
   <div class="modal fade" id="titleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Title</h5>
               <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <form action="include/update_config.php" method="post">
                  <div class="form-group mb-3">
                     <label class="form-label">Election Title</label>
                     <input class="form-control" type="text" name="siteTitle" value="<?php echo $siteTitle; ?>" required>
                  </div>
                  <div class="modal-footer">
                     <div class="gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!--======================================= TIMER MODAL ======================================= -->
   <div class="modal fade" id="timerModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Election Timer</h5>
               <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <form action="include/setTimer.php" method="post">
                  <div class="form-group mb-3">
                     <label class="form-label">Set Timer</label>
                     <input class="form-control" type="text" name="timerDate" value="<?php echo $timerDate; ?>" required>
                  </div>
                  <div class="modal-footer">
                     <div class="gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>


</body>

</html>