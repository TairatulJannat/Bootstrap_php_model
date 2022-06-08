<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <!-- ---bootstrap css--- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

            <div class="form-group">
                <label for="completename">Name</label>
                <input type="text" class="form-control" id="completename" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            

            <div class="form-group">
                <label for="completemail">Email address</label>
                <input type="email" class="form-control" id="completemail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            
            <div class="form-group">
                <label for="completemobile">Mobile</label>
                <input type="number" class="form-control" id="completemobile" aria-describedby="emailHelp" placeholder="Enter mobile">
            </div>
           
            <div class="form-group">
                <label for="completeplace">Place</label>
                <input type="text" class="form-control" id="completeplace" aria-describedby="emailHelp" placeholder="Enter place">
            </div>
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-dark" id="submit">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- update model -->

<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update user details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

            <div class="form-group">
                <label for="completename">Name</label>
                <input type="text" class="form-control" id="updatename" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            

            <div class="form-group">
                <label for="completemail">Email address</label>
                <input type="email" class="form-control" id="updatemail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            
            <div class="form-group">
                <label for="completemobile">Mobile</label>
                <input type="number" class="form-control" id="updatemobile" aria-describedby="emailHelp" placeholder="Enter mobile">
            </div>
           
            <div class="form-group">
                <label for="completeplace">Place</label>
                <input type="text" class="form-control" id="updateplace" aria-describedby="emailHelp" placeholder="Enter place">
            </div>
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="updatedetails()">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
        <input type="hidden" id="hiddendata">
        
      </div>
    </div>
  </div>
</div>

<div class="container ">
    <h1 class="text-center">PHP CRUD PROJECT</h1>
    <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#exampleModalCenter">
    Add New users
    </button>
    <div id="displayDataTable"></div>
</div>


<!-- ----bootsrap javascript--- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="lib.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
//  $(document).ready(function(){
        displayData();
    function displayData(){
            var displayData ="true";
            $.ajax({
                url:'display.php',
                type:'post',
                data: {
                    displaysend:displayData
                },
                success:function(data,status){
                    $("#displayDataTable").html(data);
                }
            })
        }
    function Deleteuser(deleteid){
        // alert(123)
        $.ajax({
            url:'delete.php',
            type:'post',
            data:{
                Deletesend:deleteid
            },
            success: function(data,status){
                displayData();
            }
        });
    }
    function getupdateuser(updateid){
        // alert(123)
        $("#hiddendata").val(updateid);

        $.post("update.php",{updateid:updateid},function(data,status){
            var userid= JSON.parse(data);
            $("#updatename").val(userid.name);
            $("#updatemail").val(userid.email);
            $("#updatemobile").val(userid.mobile);
            $("#updateplace").val(userid.place);
        });
        $("#updatemodal").modal('show');
   
    }
    function updatedetails(){
        // alert(123)
        var updatename =$("#updatename").val();
        var updatemail =$("#updatemail").val();
        var updatemobile =$("#updatemobile").val();
        var updateplace =$("#updateplace").val();
        var hiddendata =$("#hiddendata").val();
        $.post("update.php",{
            updatename:updatename,
            updatemail:updatemail,
            updatemobile:updatemobile,
            updateplace:updateplace,
            hiddendata:hiddendata,
            },
            function(data,status){
           $("#updatemodal").modal('hide');
            displayData();
        });
       
    }
    $("#submit").on('click',function(){
        // console.log(132);
        var nameAdd = $("#completename").val();
        var emailAdd = $("#completemail").val();
        var mobileAdd = $("#completemobile").val();
        var placeAdd = $("#completeplace").val();
        // console.log(nameAdd,emailAdd,mobileAdd,placeAdd);
        $.ajax({
            url:"insert.php",
            type: "post",
            data:{
                namesend:nameAdd,
                emailsend:emailAdd,
                mobilesend:mobileAdd,
                placesend:placeAdd,
            },
            success: function(data,status){
                $("#exampleModalCenter").modal('hide');
               displayData();
            }
        });
       
    });
//  });

</script>
    
</body>
</html>