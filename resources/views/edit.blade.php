<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}
    input[type=text], input[type=email], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }
    button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    }
    button:hover {
    opacity: 0.8;
    }
 
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    }
    img.avatar {
    width: 40%;
    border-radius: 50%;
    }
    .container {
    width: 30%;
    text-align: center;
    padding: 16px;
    margin-left:30%;
    }
    span.psw {
    float: right;
    padding-top: 16px;
    }
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <form  id="edit">
        
        <h2>Edit User Form:</h2>
        <form method="POST" id="editForm" action="/edit">
        <label for="uname"><b>Username:</b></label>
        <input type="text" name="name" value="{{$user->name ?? ''}}" >
        <label for="email"><b>Enter Email:</b></label>
        <input type="email" name="email"  value="{{$user->email ?? ''}}"  id="email">
        <label for="password"><b>Enter password:</b></label>
        <input type="password" name="password"  name="password">
            <button type="button"  id='send'><b>Save</b></button>
        </form>
        <div class="row">
        <div class="col text-center">
            <a class="btn btn-secondary" href="/welcome">Back</a>
        </div>
        </div>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$('#send').click(function(){
        $.ajax({
        url: 'edit',
        type: 'POST',
        dataType: 'json',
        data:  $('#edit' ).serialize(),
        success: function(response){
            console.log(response);
            if(response.status){
                window.location.href = "/welcome";
            }else{
                alert(response.error);
            }
        }
    });
})
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>