<?php
require "../../../php/connection.php";


if (isset($_POST['team_id'])) {

    $team_id = mysqli_real_escape_string($conn, $_POST['team_id']);

    $sql = "SELECT * FROM users WHERE team_id = '$team_id' AND role != 'IMP' ";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result))
        {

        $team_firstname = $row['firstName'];
        $team_lastname = $row['lastName'];
        $team_email = $row['email'];
        $team_member_id = $row['ID'];

        $profile_img_path = $row['img'];

        if (!empty($profile_img_path)) {

            $profile_img_path = "../../img/avatars/" . $profile_img_path;
        } else {
            $profile_img_path = "../../img/avatars/default/default-profile-blue.png";
        }
        
        
        echo '<div class="d-flex align-items-center mt-2 mb-2 team-information">';

            echo '<img src="' . $profile_img_path . '" alt="" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">';
            
            echo '<div class="row team-details">';
                echo '<span>' . $team_firstname . " " . $team_lastname .  '</span>';
                echo '<span>' . $team_email . '</span>';
            echo '</div>';

             
            echo '<button class="custom-remove" data-bs-target="#removeTeam" data-bs-toggle="modal" value="' . $team_member_id . '"> Remove </button>';

        echo '</div>';
        }

    } else {
        echo '<div class="d-flex align-items-center justify-content-center mt-3"> <p> No team found. Start referring now! </p> </div>' ;
        $profile_img_path = "../../img/avatars/default/default-profile-blue.png";
    }
} else {
    echo 'No team ID provided.';
}

// Close the database connection
mysqli_close($conn);
