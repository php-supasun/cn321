<?php
include 'connection.php';
session_start();

if (empty($_SESSION['username']) || $_SESSION['username'] !== $_GET['user']) {
    header("location: index.php");
    exit();
}
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
    if ($get_user->num_rows == 1) {
        $profile_data = $get_user->fetch_assoc();
    }
    $user_sql = "SELECT * FROM images WHERE user_id = " . $profile_data["user_id"];
    $get_image = $mysqli->query($user_sql);
}
?>
<!DOCTYPE html>
<html>
<head>       
    <meta charset="UTF-8">   
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v4">
    <link rel="stylesheet" href="css/style.css">
</head> 
<body style="background: #e0e0e0;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Folder Locked</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php?user=<?php echo $profile_data['username'] ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php?user=<?php echo $profile_data['username'] ?>"><?php echo $profile_data['username'] ?> 's Profile</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-2" action="edit-profile.php" method="POST">
                <input type="hidden" name="user" value="<?php echo $profile_data['username'] ?>">
                <button class="btn btn-primary" name="edit" type="submit">Edit Profile</button>
            </form>
            <button class="btn btn-danger" type="submit" onclick="logout()">Log out</button>
        </div>
    </nav>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-1">
                <nav>
                    <br>
                </nav>
            </div>
            <div class="col-lg-10">
                <div class="container">
                    <br>
                    <br>
                    <form class="form-inline my-2 my-lg-4 mr-2" action="new-upload.php" method="POST">
                        <input type="hidden" name="user" value="<?php echo $profile_data['username'] ?>">
                        <h3 style="text-align:center;width:100%">Recent upload</h3>
                        <button class="btn btn-primary" name="edit" type="submit">New Upload</button>
                        
                  
                    </form>
                    
                    <div class="row text-center text-lg-left" id="image-container">
                        <?php while ($row = $get_image->fetch_assoc()): ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 mb-2">
                                <div class="hovereffect">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode( $row['image'] ) ?>" class="img-fluid img-thumbnail img-responsive" style="height: 200px;"/>
                                    <div class="overlay">
                                        <a class="info" href="#">Share</a>
                                    </div>

                                <!--
                                <a class="info" href="#">
                                    <div>
                                        <form class="info" action="delete-image.php" method="POST">
                                            <div>
                                                <input type="hidden" name="username" value="<?php echo $user_data['username']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="submit" name="delete" value="Delete">
                                            </div>
                                        </form>
                                    </div></a>
                                -->
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <script src="js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </html>