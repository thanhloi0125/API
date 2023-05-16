<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Review Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Review Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $review_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM review WHERE id='$review_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $review = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="review_id" value="<?= $review['id']; ?>">

                                    <div class="mb-3">
                                        <label>Game Name</label>
                                        <input type="text" name="name" value="<?=$review['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Reviewer Email</label>
                                        <input type="email" name="email" value="<?=$review['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Score</label>
                                        <input type="text" name="score" value="<?=$review['score'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Rating</label>
                                        <input type="text" name="rating" value="<?=$review['rating'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_review" class="btn btn-primary">
                                            Update Review
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>