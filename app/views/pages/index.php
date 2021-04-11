<?php require APPROOT . '/views/inc/header.php'; ?>


<?php
    // how to pull information from $data in view
    foreach($data['posts'] as $post)
    {
        echo $post->title . '<br>';
    }
?>

<?php require APPROOT . '/views/inc/footer.php'; ?>