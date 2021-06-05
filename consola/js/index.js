var selected = 0;

function Seleccionar(selected) {

    //Quito el active de todos los ids
    if (document.getElementById("Ventas").classList.contains('active')) { document.getElementById("Ventas").classList.remove('active') }
    if (document.getElementById("Productos").classList.contains('active')) { document.getElementById("Productos").classList.remove('active') }
    if (document.getElementById("Reportes").classList.contains('active')) { document.getElementById("Reportes").classList.remove('active') }
    if (document.getElementById("Configuracion").classList.contains('active')) { document.getElementById("Configuracion").classList.remove('active') }
    if (document.getElementById("Categorias").classList.contains('active')) { document.getElementById("Categorias").classList.remove('active') }

    //Me fijo cual toque para agregarle su active(subrayado)
    switch (selected) {

        //VENTAS
        case 1:
            //AGREGA EL ACTIVE A VENTAS
            document.getElementById("Ventas").classList.add('active')
                //SACO OCULTAR VENTAS
            document.getElementById("VentasTitulo").classList.remove('Ocultar')
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
                //ANIADO OCULTAR A EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
            break;

            //PRODUCTOS
        case 2:
            //AGREGA EL ACTIVE A PRODUCTOS
            document.getElementById("Productos").classList.add('active')
                //ANIADO OCULTAR PRODUCTOS
            document.getElementById("ProductosTitulo").classList.remove('Ocultar')
                //ANIADO OCULTAR EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
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
                //ANIADO OCULTAR A EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
            break;

            //AGREGAR PRODUCTO
        case 4:
            //AGREGA EL ACTIVE A PRODUCTOS
            document.getElementById("Productos").classList.add('active')
                //SACO OCULTAR AGREGAR PRODUCTOS
            document.getElementById("AgregarProducto").classList.remove('Ocultar')
                //ANIADO OCULTAR PRODUCTOS
            document.getElementById("ProductosTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR VENTAS
            document.getElementById("VentasTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR REPORTES
            document.getElementById("ReportesTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR AGREGAR CONFIGURACION
            document.getElementById("ConfiguracionTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR AGREGAR CATEGORIAS
            document.getElementById("CategoriasTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR A EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
            break;

            //CONFIGURACION
        case 5:
            //AGREGA EL ACTIVE A CONFIGURACION
            document.getElementById("Configuracion").classList.add('active')
                //SACO OCULTAR CONFIGURACION
            document.getElementById("ConfiguracionTitulo").classList.remove('Ocultar')
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
                //ANIADO OCULTAR A EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
            break;

            //EDITAR PRODUCTO
        case 6:
            //AGREGA EL ACTIVE A PRODUCTOS
            document.getElementById("Productos").classList.add('active')
                //SACO OCULTAR EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.remove('Ocultar')
                //ANIADO OCULTAR PRODUCTOS
            document.getElementById("ProductosTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR VENTAS
            document.getElementById("VentasTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR REPORTES
            document.getElementById("ReportesTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR AGREGAR CONFIGURACION
            document.getElementById("ConfiguracionTitulo").classList.add('Ocultar')
                //ANIADO OCULTAR AGREGAR CATEGORIAS
            document.getElementById("CategoriasTitulo").classList.add('Ocultar')
            break;

            //CATEGORIAS
        case 8:
            //AGREGA EL ACTIVE A CATEGORIAS
            document.getElementById("Categorias").classList.add('active')
                //SACO OCULTAR DE CATEGORIAS
            document.getElementById("CategoriasTitulo").classList.remove('Ocultar')
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
                //ANIADO OCULTAR A EDITAR PRODUCTOS
            document.getElementById("EditarProducto").classList.add('Ocultar')
            break;


        default:
    }
}

//calculo automatico de precio a partir de margen
function CalculoPrecio() {
    var margen = document.getElementById("Margen").value / 100;
    var costo = document.getElementById("Costo").value;
    var oferta = document.getElementById("Oferta").value;
    var aux = +costo + (+costo * margen);
    var discount = aux * (oferta / 100);
    aux = aux - discount;
    document.getElementById("Precio").value = new Number(JSON.parse(aux));
}

function LimpiarForm() {}

//CheckboxGlobales
function CheckBoxGlobal() {
    if (document.getElementById("CheckBoxGlobal").checked = true) {
        document.getElementById("CheckBoxIndividual").checked = true;
    } else {
        document.getElementById("CheckBoxIndividual").checked = false;
    }
}

//Descarga el ticket de ventas
function DivAPdf() {

    var doc = new jsPDF();
    var elementHTML = $('#Ticket').html();
    // aca se pone una clase que no queremos que se vea en el archivo
    var specialElementHandlers = {
        '#elementH': function(element, renderer) {
            return true;
        }
    };
    doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });


    // Save the PDF
    var codigo = document.getElementById('CodigoPedido').innerHTML;
    doc.save('Pedido-' + codigo + '.pdf');
}

//Reloj Principal
function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    var d = date.getDate();
    var mes = date.getMonth() + 1;
    var a = date.getUTCFullYear();

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    var fecha = d + "/" + mes + "/" + a;
    var completetime = time + "   |   " + fecha;

    document.getElementById("MyClockDisplay").innerText = completetime;
    document.getElementById("MyClockDisplay").textContent = completetime;

    setTimeout(showTime, 1000);

}

showTime();