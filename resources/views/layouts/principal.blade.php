<!DOCTYPE html>
<html >
<head>
	
	<title>
		<?php echo "CRM - PSICUS"; ?>
	</title>

    <!--CSS-->

    {!!Html::style('css/jquery-ui.css')!!}
    {!!Html::style('css/bootstrap.css')!!}


    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
    {!!Html::style('css/bootstrap-filterable.css')!!}



    {!!Html::style('css/jquery.treegrid.css')!!}
    {!!Html::style('css/bootstrap-responsive.min.css')!!}


    {!!Html::style('css/font-awesome.min.css')!!}



    {!!Html::style('css/dataTables.bootstrap.min.css')!!}
    {!!Html::style('css/responsive.bootstrap.min.css')!!}


    {!!Html::style('css/style.css')!!}

    {!!Html::style('css/jquery.alerts.css')!!}

    {!!Html::style('css/bootstrap-datetimepicker.min.css')!!}





    <!--JAVASCRIPT-->
    {!!Html::script('js/jquery-1.12.0.min.js')!!}

    {!!Html::script('js/bootstrap-editable.min.js')!!}
    {!!Html::script('js/jquery.filterable.js')!!}

    {!!Html::script('js/jquery.treegrid.js')!!}
    {!!Html::script('js/jquery.treegrid.bootstrap2.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}

    {!!Html::script('js/jquery.dataTables.min.js')!!}
    {!!Html::script('js/dataTables.bootstrap.min.js')!!}
    {!!Html::script('js/dataTables.responsive.min.js')!!}
    {!!Html::script('js/responsive.bootstrap.min.js')!!}


    
    
    {!!Html::script('js/jquery-ui.js')!!}

    {!!Html::script('js/jquery.Rut.min.js')!!}
    {!!Html::script('js/jquery.maskMoney.js')!!}

    {!!Html::script('js/jquery.alerts.js')!!}

    {!!Html::script('js/bootstrap-datetimepicker.min.js')!!}

    @section('scripts')
    @show
  
</head>

 @if(Auth::check())





    <body >

        <style>
            ul#headd li {
                display:inline;
            }
        </style>

          
        @include('layouts.header')


        <!-- CONTENIDO -->
        <div class="main">
          <div class="main-inner">
            <div class="container">
              

                <!-- CONTENIDO DESDE LAS VISTAS-->	
        			    @yield('content')

              
            </div>
          </div>
        </div>
        <!-- /CONTENIDO -->


        @include('layouts.extra')
        <!-- /extra -->
        @include('layouts.footer')
      <!-- /footer --> 
    	
    </body>
@else 
<script type="text/javascript">
   $(document).ready( function() {
      url = "/log";
      $(location).attr("href", url);
   });
</script>

@endif


</html>
