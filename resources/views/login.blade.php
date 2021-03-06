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
    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
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
    }
    </style>
</head>

<body>
    <form  id="login">
        <div class="container">
        <h2>Login Form:</h2>
            <input type="text" placeholder="Enter Username" name="name" required>
            <input type="email" placeholder="Enter Email" name="email" required>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="button"  id='send'>Login</button>
            <div class="row">
        <div class="col text-center">
            <a class="btn btn-secondary" href="/welcome">Back</a>
        </div>
        </div>
    </div>

        </div>
    </form>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$('#send').click(function(){
        $.ajax({
        url: 'login-hash',
        type: 'POST',
        dataType: 'json',
        data:  $('#login' ).serialize(),
        success: function(response){
            if(response.status)
            {
                window.location.href = "/edit";
            }
            else
            {
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