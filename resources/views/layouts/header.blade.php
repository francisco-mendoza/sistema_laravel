 <header id="header" style="background-color: #F48A4F;padding-bottom: 1px; padding-top: 6px;">
           
           <ul id="headd" style=" padding-left: 10%;">
             <li style="color:#F0F0F0; "> CRM PSICUS &nbsp;</li>

             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            


             @if(Auth::check())


                <li style="color:#F0F0F0;"> Usuario: {!!Auth::user()->nombreUsuario!!}{!!Auth::user()->apellidoUsuario!!} &nbsp;</li>


             @endif




             <li class="glyphicon glyphicon-user" style="color:#F0F0F0;"></li>
             <a href="/logout"><li class="glyphicon glyphicon-off" style="color:#F0F0F0;"></li></a>
             
           </ul>

           <ul id="headd" style="">
             
           </ul>


 </header>

  
	
<script>
         
        var selector, elems, makeActive;

        selector = '.menu li';

        elems = document.querySelectorAll(selector);

        makeActive = function () 
        {
            for (var i = 0; i < elems.length; i++)
                elems[i].classList.remove('active');

            this.classList.add('active');
        };

        for (var i = 0; i < elems.length; i++)
            elems[i].addEventListener('mousedown', makeActive);

</script>

<!-- /navbar -->
<div class="subnavbar" >
  <div class="subnavbar-inner">
    <div class="container" >
      <ul class="mainnav menu" id="menu">
        <li id="dashboard"><a href="/"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        
        <li id="clientes">        
                <a href="/cliente"><i class="icon-list-alt"></i><span>Clientes</span> </a>        
        </li>

        <li id="contactos">        
              <a href="/contacto"><i class="icon-book"></i><span>Contactos</span> </a> 
        </li>
        <li id="actividades">         
        <a href="/actividad"><i class="icon-bar-chart"></i><span>Actividades</span> </a>         
        </li>
        
        <li id="mercadopublico"><a href="/mercadopublico"><i class="icon-shopping-cart"></i><span>Mercado Público</span> </a> </li>
        <li id="mailchimp"><a href="/mailchimp"><i class="icon-envelope"></i><span>Mail Chimp</span> </a> </li>
        
        <li><a href="#"><i class="icon-code"></i><span>Proyectos</span> </a> </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-wrench"></i><span>Configuración</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/usuario">Usuarios</a></li>
           
            
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>


