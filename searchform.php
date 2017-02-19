
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

  <style>
    body {

     font-family: HelveticaNeue,Helvetica Neue,Helvetica,Arial,sans-serif;
     font-weight:900;

    }
    input {

      border-radius:6px;
      padding:5px;
      border: 1px solid #d1d1d1;
    }

    input[type="submit"] {
          display: block;
    margin-top: 20px;
    background: #dadada;
    border:none;
    font-weight:900;
    padding:7px;
    }
  
  </style>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#myform').submit(function(){ //when form is submitted..
            window.location = "http://watchclubamsterdam.com/search.php?key=" + $('#url').val() + '&min=' + $('#minprice').val() + '&max=' + $('#maxprice').val(); //..get url from the textbox and load that url
            return false; // prevent the form from being submitted
        });
    });
  </script>
</head>

<body>
  <form id="myform">
    <p>Brand or model:</p>
    <input type="text" id="url" value="">
    <p>Min. Price:</p>
    <input type="text" id="minprice" value="0">
    <p>Max. price:</p>
    <input type="text" id="maxprice" value="50000">
    <input type="submit" id="submit" value="Search watches" />
  </form>

</body>

</html>