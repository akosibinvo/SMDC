<?php

require "../../php/connection.php";
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
	
      <!--======================================= ADD PROJECT MODAL ======================================= -->
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
                        <input class="form-control" type="text" name="projectname" placeholder="Enter project name" required>
                     </div>

                     <div class="form-group mb-3">
                        <label class="form-label">Unit Code</label>
                        <input class="form-control" type="text" name="unitcode" placeholder="Enter unit code" required>
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


      <!--======================================= EDIT MODAL ======================================= -->
      <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                  <form action="../include/editModal.php" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="update_id" id="update_id">
                     <div class="row mb-3">
                        <div class="form-group col-md-6">
                           <label class="form-label">Project Name</label>
                           <input class="form-control" type="text" name="projectname" id="projectname" placeholder="Enter project name" required>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label">Unit Code</label>
                           <input class="form-control" type="text" name="unitcode" id="unitcode" placeholder="Enter unit code" required>
                        </div>
                     </div>

                     <div class="modal-footer">
                        <div class="gap-2 mt-4">
                           <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

    

      <!--======================================= DELETE MODAL ======================================= -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form action="include/delete.php" method="POST">
                     <input type="hidden" name="candidate_id" id="candidate_id">
                     <button type="submit" name="delete" class="btn btn-danger"> Delete </button>
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



   </body>
</html>