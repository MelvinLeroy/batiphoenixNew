<?php
include('../inc/db.php');

$sql = 'UPDATE commandes SET status="read" WHERE id="'.htmlspecialchars(addslashes($_GET['id'])).'"';
$query = $db->query($sql);
?>
        <script type='text/javascript'>
            alert('Devis validés ');
            window.location.href = "../admin/devis.php";
        </script>
    <?php
?>