function zaduzi(){
    var id = document.getElementById("myrow").childNodes[0].nodeValue;
    console.log(id);


        $.ajax({
            url: './handler/update.php',
            type: 'POST',
            data: {'id': id},
            success: function(data){
                if (data) {
                console.log("updated");
                } else {
                    $('#error').load("custom/static/error.html");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                $('#error').html("Greška" + errorThrown);
            }
        });
    
}
function dodaj(){
  var id = document.forms["addForm"]["id"].value;
  var title = document.forms["addForm"]["title"].value;
  var author = document.forms["addForm"]["author"].value;
  console.log(id);
  console.log(title);
  console.log(author);

  if (id == "" || title == "" || author == "") {
    alert("Forms must be filled out");
    return false;
  }

    $.ajax({
            url: './handler/add.php',
            method:'POST',
            type: 'POST',
            data: {'id': id, 'title':title, 'author':author},
            dataType: 'json',
            success: function(data){
                if (data) {
                console.log("added");
                } else {
                    $('#error').load("custom/static/error.html");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                $('#error').html("Greška" + errorThrown);
            }
        });
}




 






