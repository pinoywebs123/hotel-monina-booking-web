<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monina RM Midtown</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

 

<style type="text/css">
    #txt{
        font-size: 48px;
    }
    .navbar {
     background: #2c3e50 !important;
   }
   #sides ul {
    background: #2c3e50 !important;
   }
   body {
    background: #2c3e50;
   }
   span{
    font-size: 40px;
   }
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test"></a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->email}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                        <li>
                            <a href="{{route('admin_profile')}}"><i class="fa fa-fw fa-gear"></i> Profile</a>
                        </li>
                         <li>
                            <a href="{{route('admin_settings')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                	<li>
                       <a href="#">
                          <p class="text-center" style="color: #fff">{{Auth::user()->fname}} {{Auth::user()->lname}}</p>
                          
                       
                       </a>
                    </li>
                    <li >
                      <a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li >
                      <a href="{{route('admin_walkin')}}" ><i class="glyphicon glyphicon-home"></i> Walk-in</a>
                    </li>
                    <li class="active">
                      <a href="{{route('admin_rooms')}}" ><i class="glyphicon glyphicon-home"></i> Room Maps</a>
                    </li>
                    <li >
                      <a href="{{route('admin_reports')}}" ><i class="glyphicon glyphicon-th-list"></i> Report</a>
                    </li>
                     
                    <li >
                      <a href="{{route('admin_users')}}" ><i class="glyphicon glyphicon-th-list"></i> Users</a>
                    </li>
                    
                     <li >
                      <a href="{{route('admin_payment_personnel')}}" ><i class="glyphicon glyphicon-usd"></i> Payment Personnel</a>
                    </li>
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="{{route('admin_rooms')}}">List</a></li>
              <li role="presentation" class="active"><a href="{{route('admin_rooms_create')}}">Create</a></li>
              
            </ul>

            <div class="panel panel-default">
              <div class="panel-heading">
                
              </div>
              <div class="panel-body">
                <div class="col-md-6">
                  @if(Session::has('info'))
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Information! </strong>{{Session::get('info')}}
                    </div>
                  @endif
                   
                  <h3>Create Room Type</h3>
                  <form action="{{route('admin_create_check')}}" method="POST">
                    <div class="form-group">
                      <label>Room Type</label>
                      <input type="text" name="room_type" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="room_desc" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" name="price" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Person</label>
                      <input type="number" name="person" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{csrf_field()}}
                  </form>
                </div>

                <div class="col-md-6">
                   @if(Session::has('info2'))
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Information! </strong>{{Session::get('info2')}}
                    </div>
                  @endif
                  @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Information! </strong>{{Session::get('error')}}
                    </div>
                  @endif
                  <h3>New Rooms</h3>
                  <form action="{{route('admin_room_in_cat')}}" method="POST">
                    <div class="form-group">
                      <select name="room_type" class="form-control" required="">
                        @foreach($cats as $cat)
                          <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Room Number</label>
                      <input type="number" name="room_number" class="form-control" required="">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{csrf_field()}}
                  </form>
                </div>
              </div>
            </div>
        </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
 

</body>

</html>
