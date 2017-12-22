<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Twin Hotel Reservation</title>

    
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
                    <li >
                      <a href="{{route('admin_rooms')}}" ><i class="glyphicon glyphicon-home"></i> Room Maps</a>
                    </li>
                    <li class="active">
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
          <li role="presentation" ><a href="{{route('admin_reports')}}">Reservation</a></li>
          <li role="presentation"><a href="{{route('admin_checkin')}}">Check-in</a></li>
          <li role="presentation"><a href="{{route('admin_checkout')}}">Check-out</a></li>
           <li role="presentation"><a href="{{route('admin_cancel')}}">Cancelattion</a></li>
          <li role="presentation" ><a href="{{route('admin_rate')}}">Room rate</a></li>
           <li role="presentation" class="active"><a href="{{route('admin_amenities')}}">Amenities</a></li>
         
        </ul>
          <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#newAmenities">New Amenities</a><br><br>
           @if(Session::has('yes'))
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Information!</strong>{{Session::get('yes')}}
                    </div>
                  @endif
           <button type="button" class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-print" id="printHotel"></i></button>         
          <table class="table">
            <thead>
              <tr>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Actions</td>
                
              </tr>
            </thead>

            <tbody>
              @foreach($cat as $ca)
                <tr>
                  <td>{{$ca->amenities_name}}</td>
                  <td>{{$ca->price}}</td>
                  <td>{{$ca->quantity}}</td>
                  <td>
                      <form action="{{route('admin_amenities_delete',['id'=> $ca->id])}}"  method="get" id="formDel{{$ca->id}}">
                        <button type="button" value="{{$ca->id}}" class="btn btn-danger btn-xs delMe"><i class="glyphicon glyphicon-trash"></i></button>
                        <a href="{{route('admin_amenities_edit', ['id'=> $ca->id])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                      </form>
                      
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>


        </div>
           

        </div>
       
       
    <div class="modal fade" id="newAmenities">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="text-center">Enter New Customer Informations</h3>
            </div>
            <div class="modal-body">
              <form action="{{route('admin_add_amenities')}}" method="POST">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="am_name" class="form-control" required="" maxlength="20">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" name="am_price" class="form-control" required="" maxlength="20" min="0">
                </div>
                 <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" name="am_quantity" class="form-control" required="" maxlength="20" min="0">
                </div>
                
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                 <button type="button" class="btn btn-default">CLEAR</button>
              </form>
            </div>
          </div>
        </div>
      </div> 
      

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script> 
    
 <script type="text/javascript">
    $(document).ready(function(){
        $(".delMe").click(function(){
            var id_to_del = $(this).attr("value");

            swal({
              title: "Are you sure?",
              text: "Once deleted, Customer will no longer see this Amenity" + id_to_del,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Yehey! Amenity has been successfully deleted!", {
                  icon: "success", 
                });
                $("#formDel" + id_to_del).submit();
              } 
            });
        });
       
    });

    $(document).ready(function(){
        $("#printHotel").click(function(){
          window.print();
        });

      });
</script>
    
 

</body>

</html>
