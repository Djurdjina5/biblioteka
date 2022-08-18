function zaduzi(){
    //var data = document.getElementById(rowId).querySelectorAll(".row-data"); 
    var id = document.getElementById("myrow").childNodes[0].nodeValue;
    console.log(id);


        $.ajax({
            url: './handler/update.php',
            type: 'POST',
            data: { id:id
            },
            success: function(data){
                if (data) {
                console.log("updated");
                } else {
                    $('#error').load("custom/static/error.html");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                $('#error').html("oops" + errorThrown);
            }
        });
    
}