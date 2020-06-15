<!doctype html>
<html lang="en">
  <head>
    <style>
        body {
            background-image: url('../../asset/IMG/image1.jpg');
            background-size: cover ;
            height: 10%;
        }
        .coul{
            background-color: yellow;
        }
    </style>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- bootstrap local -->
     <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
  </head>
  <body>
      <div class="container-fluid no-gutters">
        <!-- header -->
        <div class="row  bg-dark p-2 justify-content-center text-secondary ">
            <div class="col-12 col-md-12 col-10 text-center">   
                <h2 class="text-light">FEND OFF YOURS LIMITS</h2>
                
             </div>   
        </div>

      <div class="row no-gutters mt-3 ">  
          
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-justify-between" >  
                <nav class="navbar navbar-expand-md navbar-light bg-dark  ">
            
            <!-- bouton amburger -->
            <button
                type="button"
                class="navbar-toggler bg-light"
                data-toggle="collapse"
                data-target="#nav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- collapse pr la disparition des menu navbar colapse est lier a navbar expand  -->
            <div class="collapse navbar-collapse justify-content-between" id="nav">
                <ul class="navbar-nav">
                    <div class="col-lg-4 col-sm-1 col-md-3 bg-light">
                        <li class="nav-item ">
                        <!-- px-3 = padding 3px-->
                            <a class="nav-link text-primary font-weight-bold text-uppercase px-3" href="adminpage.php" >Private Information</a>
                        </li>
                    </div>
                    <div class="col-lg-3 col-sm-1 col-md-2 bg-light">
                        <li class="nav-item">
                            <a class="nav-link text-primary font-weight-bold text-uppercase px-3" href="items.php" id="item" style=" " >Items</a>
                        </li>
                    </div>  
                    <div class="col-lg-4 col-sm-1 col-md-3 bg-light ">
                        <li class="nav-item " >  
                            <a class=" nav-link active text-primary font-weight-bold text-uppercase px-3" href="create_question.php" id="create"  >Create questions</a>
                        </li>
                    </div>  
                    <div class="col-lg-3 col-sm-1 col-md-2 bg-light">   
                        <li class="nav-item">
                            <a class="nav-link text-primary font-weight-bold text-uppercase px-3" href="create_admin.php" >Create manager</a>
                        </li>
                    </div> 
                    <div class="col-lg-3 col-sm-1 col-md-2 bg-light">  
                        <li class="nav-item">
                            <a class="nav-link text-primary font-weight-bold text-uppercase px-3" href="players.php" >Players</a>
                        </li>
                    </div>      
                
                </ul>
            
            </div>
            </nav>

            </div>

        </div>

        
                <div id="chargement"> </div>
    </div>
    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/bootstrap.js"></script>
  </body>
</html>
<script>
    //  $("a#item").click(function(){
    //      //alert('okkkk')
    //     $( "#chargement" ).load( "items.php" );
    //  }) ; 

    //  $("a#create").click(function(){
    //      //alert('okkkk')
    //     $( "#chargement" ).load( "create_question.php" );
    //  }) ; 
 
 
    // when souris hover menu and when we left also
    $('a').hover(function(){
        $('a').css("background-color"," ") ;
        $(this).css("background-color","purple" ) ;
    },
    function(){
        $('a').css("background-color"," ") ;
        $(this).css("background-color","white" )  ; 
    })
   
</script>

 