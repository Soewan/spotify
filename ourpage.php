<?php
include("includes/includedFiles.php");
?>

<style>
    /* CSS Styles */
    .term-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .term {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
    }

    .term-title {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .term-description {
        font-size: 16px;
        color: #666;
    }

    .term-actions {
        margin-top: 10px;
    }

    .term-actions a {
        margin-right: 10px;
        color: #333;
        text-decoration: none;
    }
</style>

<div class="term-container"><!-- Term Container Starts -->

    <?php
    $get_terms = "SELECT * FROM about_us";
    $run_terms = mysqli_query($con, $get_terms);

    while ($row_terms = mysqli_fetch_array($run_terms)) {
        $term_id = $row_terms['about_id'];
        $term_desc = substr($row_terms['about_desc'], 0, 1000);
    ?>

        <div class="term"><!-- Term Starts -->

            <div class="term-title"><?php  echo "Stella institution"; ?></div>

            <div class="term-description"><?php echo $term_desc; ?></div>

        </div><!-- Term Ends -->

    <?php } ?>

</div><!-- Term Container Ends -->
