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

 .navbar .navbar-brand{
    color: #fff !important;
  }
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

<div class="container">
 <aside>
            <div class="form-group">
              <label>Click Below</label>
                <select name="cat_room" id="cat_room" class="form-control">
                    <option value="">Select Room Category</option>
                    @foreach($cat_rooms as $one)
                        <option value="{{$one->id}}" id="{{$one->id}}">{{$one->category_name}}</option>
                    @endforeach
                </select>
            </div>


            <div id="desc">
                <h2>DESCRIPTION</h2>
                
                <div id="tbl">
                   
                    <table class="table">
                        <tr>
                            <td>CAPACITY:</td>
                            <td id="person_num">select</td>
                        </tr>

                        <tr>
                            <td>ROOM RATE:</td>
                            <td id="price">select</td>
                        </tr>
                    </table>
                </div>
            </div>
            
         
        </aside>

        <section>
            
           <div class="col-md-4">
              
            <h1>List of Rooms</h1>
            
            <ul id="rooms">

            </ul>
           </div>
           <div class="col-md-4">
              <h2>Amenities</h2>
              <ul>
                <li>With Air conditon</li>
                <li>Hot and Cold shower</li>
                <li>Cable Television</li>
                <li>Fast Wifi</li>
                <li>Nice and Classy Swimming Pool</li>
                <li>Refrigerator <mark>Only for Deluxe and Family B</mark></li>
              </ul>
            </div>
            <div class="col-md-4" >
              <h2 class="text-center">Preview</h2>
              <div id="thumb" style="height: 300px">
                
              </div>
            </div>
        </section>
          
         <div class="clearer"></div> 
</div>











</body>
<script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <<script type="text/javascript">
        $(document).ready(function(){
            $("#cat_room").change(function(){
                var aw = $("#cat_room").val();
                var token = '{{Session::token()}}';
                var url = '{{route('get_rooms')}}';
                
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {id: aw, _token : token},

                })
                .done(function(msg){
                    if(msg['category'] == null)
                        document.querySelector("#desc").style.display = "none";
                    else
                        document.querySelector("#desc").style.display = "block";

                    var person = document.querySelector('#person_num');
                    var price = document.querySelector('#price');
                    
                    person.innerHTML = msg['category']['person'];
                    price.innerHTML = msg['category']['price'];

                    var roomList = document.querySelector('#rooms');
                    roomList.innerHTML = "";

                    for(var i = 0; i < msg['rooms'].length; i++) {
                        var li = document.createElement('li');
                        var a = document.createElement('a');
                        var aCont = document.createTextNode(msg['rooms'][i]['room_number']);

                        a.setAttribute('href', "{{route('tambook')}}?id="+msg['rooms'][i]['id']);
                        a.appendChild(aCont);
                        li.appendChild(a);
                        roomList.appendChild(li);
                    }
                });

                var changeBg = document.querySelector('#thumb');
                changeBg.style.background = 'url(../image/' + aw + '.jpg)';
                changeBg.style.backgroundSize = 'cover';
            });
        });
    </script>
</html>
