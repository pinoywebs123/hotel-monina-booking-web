<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Monina RM Midtown</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .navbar{
    background: #2ecc71 !important;
  }
  .navbar-default .navbar-nav>li>a {
    color: #fff !important;
  }
  
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
 
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Monina RM Midtown</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/')}}">HOME</a></li>
        <li><a href="{{route('rooms')}}">VIEW ROOMS</a></li>
        <li><a href="{{route('tariff')}}">TARIFF RATES</a></li>
        <li><a href="{{route('customer_activity')}}">ACTIVITY</a></li>
        <li><a href="{{route('customer_logout')}}">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<aside>
            
            
            <h2>SELECTED</h2>
            
            <div>
                  <h3 class="text-center">ROOM TYPE: {{$find->category->category_name}}</h3>
                  <h3 class="text-center">ROOM NUMBER: {{$find->room_number}}</h3>
                </div>
            
           
        
        <div class="container">
            <?php $id = $_GET['id'];?>
         
                @if(Session::has('yes'))
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Information!</strong>{{Session::get('yes')}}
                    </div>
                  @endif

                <div class="col-md-6">
                  <h3 class="text-center">BOOK HERE</h3>
                     <form action="{{route('book_now', ['id'=> $id])}}" method="POST" id="wakoForm">
                         <div class="form-group">
                            <label>Price: {{$find->category->price}}</label>
                        </div>

                        <div class="form-group">
                            <label>Check-in Time: </label>
                            <input type="time" name="check_in_time" class="form-control" required="" id="check_in_time">
                        </div>
                        <div class="form-group">
                            <label>Check-in Date: </label>
                            <input type="date" name="check_in_date" class="form-control" required="" id="check_in_date" min="<?php echo date("Y-m-d"); ?>" >
                        </div>
                        <div class="form-group">
                            <label>Check-out Date: </label>
                            <input type="date" name="check_out_date" class="form-control" required="" id="check_out_date" min="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group">
                            <label>Additional Occupants below: </label>
                            <input type="number" name="occupants_one" placeholder="Additional occupants 250/head" class="form-control" min="0" id="person" value="0">
                        </div>
                  
                      {{csrf_field()}}
                         <button id="sub_total" type="button" class="btn btn-info">TOTAL</button>
                        <button type="button" class="btn btn-primary" id="submitBtn" disabled="">SUBMIT</button>
                </div>

                <div class="col-md-6">
                       
                         <div class="form-group" >

                            <label id="web_total" style="margin-top: 100px"></label><br>
                           
                            <label id="web_person"></label><br>
                            <label id="web_total3"></label>
                            <input type="hidden" name="totalprice" id="totalprice">
                           
                            <input type="hidden" name="total_quantity" id="total_quantity">
                            <input type="hidden" name="occupants" id="real_person" value="{{$find->category->person}}">
                        </div>
                        
                    </form>

                    
                </div>
          </div>
        
        
    </body>
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script> 
    <script type="text/javascript">
     @if(Session::has('no'))
           swal("Error", "This room has been occupied by this date of reservation.", "warning");
    @endif
       
    @if(Session::has('ok'))
           swal("Success", "Thank You for booking us.", "success");
    @endif


        $(document).ready(function(){
             var days = 0;
            $("#sub_total").click(function(){
                  var price = {{$find->category->price}};
                  check_in = $("#check_in_date").val();
                  check_out =  $("#check_out_date").val();
                  var date2 = new Date(check_in);
                  var date1 = new Date(check_out);
                  var timeDiff = Math.abs(date1.getTime() - date2.getTime());
                  days = Math.ceil(timeDiff / (1000 * 3600 * 24));
                  var add_occupants = $("#person").val();
                  var person_price = $("#person").val() * 250;
                  var prices = document.querySelectorAll('.price');
                  var quantities = document.querySelectorAll('.quantity');
                  var subTotal= 0;
                  var amenities = '';
                  var quantities2 = '';
                  var real_person = $("#real_person").val();
                  var add_person = $("#person").val();
                  var total_person = parseInt(real_person) + parseInt(add_person);

                 

                  
               

                  $("#web_total").text("Sub Total: "+days * price);
                  $("#web_total3").text("Total Payments: "+((days * price) + subTotal + person_price));
                  $("#web_person").text("Additional Occupants: "+add_occupants +" = "+ person_price);
                  $("#totalprice").val(((days * price) + subTotal + person_price) );

                  $("#total_amenity").val(amenities);
                  $("#total_quantity").val(quantities2);
                  $("#real_person").val(total_person);


                  console.log(quantities);
            });

            $("#submitBtn").click(function(){
                if(days > 2){
                    swal("Error", "You are only allowed to stay in 2 days", "warning");
                   
                }else{
                     $("#wakoForm").submit();
                }
            });

            $("#sub_total").click(function(){
              var d = new Date();
              var curDate = d.getFullYear() + "-" +0+parseInt( d.getUTCMonth() + 1 )   + "-" +d.getDate();


              var check_in_time = $("#check_in_time").val();
              var check_in_date = $("#check_in_date").val();
              var check_out_date = $("#check_out_date").val();

              if(check_in_time == "" || check_in_date == "" || check_out_date == ""){
               swal("Error", "All fields are strickly required!", "warning");
                
              }else{
                if(days > 2){
                    swal("Error", "You are only allowed to stay in 2 days", "warning");
                   
                }

                if(curDate > check_in_date){
                  swal("Error", "You are not allowed reserve below present date, Try another date.", "warning");
                }

                $("#submitBtn").removeAttr("disabled");
               
              }

             

            });
          

        });

    </script>
   
</html>