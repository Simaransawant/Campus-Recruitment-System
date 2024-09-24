<?php 
session_start();
if(isset($for_session['username'])){

    session_destroy();
    echo "<script>location.href='index.html'</script>";
}
else{
    echo "<script>location.href='index.html'</script>";
}
?>