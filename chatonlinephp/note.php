function getUserStatus(userID) {
        $.ajax({
            type: "POST",
            url: "<?=URL ?>/xuly/checkstatus",
            data: { user_id: userID },
            dataType: "json",
            success: function(response) {
                if(response.status == "online") {
                    $("#status-" + userID).addClass("");
                } else {
                    $("#status-" + userID).addClass("ofline");
                    
                }
                setInterval(function() {
            getUserStatus(userID);
        }, 5000); 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error: " + errorThrown);
            }
        });
      
    }
    <?php foreach($user_all as $row) { ?>
        getUserStatus(<?php echo $row['id']; ?>);
    <?php } ?>
    form index