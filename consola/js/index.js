
  var selected=0;
  function Seleccionar(selected){
    //Quito el active de todos los ids
    if(document.getElementById("Inicio").classList.contains('active')){document.getElementById("Inicio").classList.remove('active')}
    if(document.getElementById("Ventas").classList.contains('active')){document.getElementById("Ventas").classList.remove('active')}
    if(document.getElementById("Productos").classList.contains('active')){document.getElementById("Productos").classList.remove('active')}
    if(document.getElementById("Reportes").classList.contains('active')){document.getElementById("Reportes").classList.remove('active')}
    if(document.getElementById("Configuracion").classList.contains('active')){document.getElementById("Configuracion").classList.remove('active')}
    if(document.getElementById("Categorias").classList.contains('active')){document.getElementById("Categorias").classList.remove('active')}
    
  //Me fijo cual toque para agregarle su active(subrayado)
  switch(selected){

      //INICIO
  case 0:
      //AGREGA EL ACTIVE A INICIO
      document.getElementById("Inicio").classList.add('active')
      //SACO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR REPORTES
      document.getElementById("ReportesTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.add('Ocultar') 
    break;

      //VENTAS
    case 1:
      //AGREGA EL ACTIVE A VENTAS
      document.getElementById("Ventas").classList.add('active')
      //SACO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR REPORTES
      document.getElementById("ReportesTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.add('Ocultar')   
    break;

      //PRODUCTOS
    case 2:
      //AGREGA EL ACTIVE A PRODUCTOS
      document.getElementById("Productos").classList.add('active')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR REPORTES
      document.getElementById("ReportesTitulo").classList.add('Ocultar')
       //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar')   
      //ANIADO OCULTAR AGREGAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.add('Ocultar')   
      break;

      //REPORTES
    case 3:
      //AGREGA EL ACTIVE A REPORTES
      document.getElementById("Reportes").classList.add('active')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ReportesTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')
        //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.add('Ocultar')  
    break;
          
      //AGREGAR PRODUCTO
    case 4:
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("AgregarProducto").classList.remove('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')

    break;

      //CONFIGURACION
    case 5:
      //AGREGA EL ACTIVE A CONFIGURACION
      document.getElementById("Configuracion").classList.add('active')
      //SACO OCULTAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')
        //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR REPORTES
      document.getElementById("ReportesTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.add('Ocultar')  
    break;
      
      //CATEGORIAS
    case 8:
      //AGREGA EL ACTIVE A CATEGORIAS
      document.getElementById("Categorias").classList.add('active')
      //SACO OCULTAR DE CATEGORIAS
      document.getElementById("CategoriasTitulo").classList.remove('Ocultar')
      //ANIADO OCULTAR INICIO
      document.getElementById("InicioTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR VENTAS
      document.getElementById("VentasTitulo").classList.add('Ocultar')
      //ANIADO OCULTAR PRODUCTOS
      document.getElementById("ProductosTitulo").classList.add('Ocultar')
        //ANIADO OCULTAR AGREGAR PRODUCTO
      document.getElementById("AgregarProducto").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR REPORTES
      document.getElementById("ReportesTitulo").classList.add('Ocultar') 
      //ANIADO OCULTAR AGREGAR CONFIGURACION
      document.getElementById("ConfiguracionTitulo").classList.add('Ocultar') 
      break;

  
    default:
    }
  }


    function CalculoPrecioSov() {
    var margen = document.getElementById("MargenSov").value/100;
    var costo = document.getElementById("Costo").value;
    var aux = +costo+(+costo*margen);
      //falta hacer que redondee  
    //document.getElementById("PrecioSov").value = aux;
    //document.getElementById("PrecioSov").setAttribute('value', aux);
    document.getElementById("PrecioSov").value= new Number(JSON.parse(aux));
    }



    function CalculoPrecioML() {
      var margen = document.getElementById("MargenML").value/100;
      var costo = document.getElementById("Costo").value;
      var aux = +costo+(+costo*margen);
        //falta hacer que redonde
        //document.getElementById("PrecioML").value = aux;
        //document.getElementById("PrecioML").setAttribute('value', aux);
        document.getElementById("PrecioML").value= new Number(JSON.parse(aux));



      }
  

      function LimpiarForm(){
        

      }
