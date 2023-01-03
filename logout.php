<?php
session_start();
include("includes/link.php");
$_SESSION['login']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="../index.php";
</script>