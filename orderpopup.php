<?php
// echo "<script>
// // Remove the last entry from the browsing history
// history.go(-1);
// </script>";


    include("popup.php");

    echo '<script>

    const paragraph = document.getElementById("msg");
    paragraph.textContent = "Order  successful";
    

    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the close button
    var close = document.getElementsByClassName("close")[0];
    
    // When the user clicks on the close button, hide the modal
    close.onclick = function() {
      modal.style.display = "none";
      history.go(-1);

    }
    
    // When the page is loaded, show the modal
    window.onload = function() {
      modal.style.display = "block";
    }
    </script>';



?>