<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_review']))
{
    $review_id = mysqli_real_escape_string($con, $_POST['delete_review']);

    $query = "DELETE FROM review WHERE id='$review_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Review Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Review Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_review']))
{
    $review_id = mysqli_real_escape_string($con, $_POST['review_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $score = mysqli_real_escape_string($con, $_POST['score']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);

    $query = "UPDATE review SET name='$name', email='$email', score='$score', rating='$rating' WHERE id='$review_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Review Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Review Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_review']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $score = mysqli_real_escape_string($con, $_POST['score']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);

    $query = "INSERT INTO review (name,email,score,rating) VALUES ('$name','$email','$score','$rating')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Review Created Successfully";
        header("Location: review-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Review Not Created";
        header("Location: review-create.php");
        exit(0);
    }
}

?>