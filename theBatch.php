<!DOCTYPE html>
<html>
	<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <script src="jquery.js"></script>
    <script src="jquery-ui.min.js"></script>
		<link rel="stylesheet" href="styles.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
    <script>
      $(document).ready(function(){		
				$('#form1').hide();
				$('.bucket').click(function(){  
          $('#form1').toggle();
					$('#date').datepicker({
            dateFormat: "yy-mm-dd"
					}).val();
          });

        $('#results').on("dblclick",".tRows", function(){
          var key= $(this).attr('id');
          $.ajax({
            type: "POST",
            url: "harvest.php",
            data: {key},
            success: function(){
              $("#results").load("db_results.php");			
            },		
            error: function(){
              alert("Ajax error");
            }, //error 
          }); //ajax call
        }); //event handler
      }); //doc ready
    </script>
    <script>
      $(document).ready(function(){	
        $( "#form1" ).submit(function( event ) {
          if ( ($( "#date" ).val().length === 0) || ($( "#required" ).val().length === 0) || ($( "#required1" ).val().length === 0)
          || ($( "#required2" ).val().length === 0)|| ($( "#required3" ).val().length === 0)) {
            alert("Please fill out all fields");
            event.preventDefault();
          }
          else {$(function (){
            event.preventDefault();
            var $date = $('#date');
            var $tType = $('#required');
            var $tWeight = $('#required1');
            var $sWeight = $('#required2');
            var $bTime = $('#required3');
		
            var formData ={
            date: $date.val(),
            tType: $tType.val(),
            tWeight: $tWeight.val(),
            sWeight: $sWeight.val(),
            bTime: $bTime.val(),
            };	
	
            $.ajax({
              type: "POST",
              url: "form_submit.php",
              data: formData,
              success: function(){
                $("#results").load("db_results.php");			
              },
              error: function(){
              alert("Ajax error posting to database");
              }, //error
            }); //ajax call
          }); //else function
          }; //else
        }); //event handler
      }); //doc ready 
    </script>
  </head>
  <body>
    <div class="outer">
      <button class="bucket">CREATE NEW BATCH</button>
    </div></br>
    <form id="form1" name="batch" action="batch.php" method="POST">
      Date:
      <input type="text" name="date" id="date"></br>
      Tea Type:
      <input type="text" id="required" name="tType"></br>
      Tea g:
      <input type="text" id="required1" name="tWeight"></br>
      Sugar g:
      <input type="text" id="required2" name="sWeight"></br>
      Brew Time:
      <input type="text" id="required3" name="bTime"></br>
      <input type="submit" class="bucket submit" value="Submit">
    </form>
    <div id="results">
      <?php
        include 'db_results.php';
      ?>	
    </div>
  </body>
</html>











