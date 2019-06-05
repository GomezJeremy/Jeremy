<html>
    <head>
        <style>
            .header{background:#eee;color:#444;border-bottom:1px solid #ddd;padding:10px;}

            .client-detail{background:#ddd;padding:10px;}
            .client-detail th{text-align:left;}

            .items{border-spacing:0;}
            .items thead{background:#ddd;}
            .items tbody{background:#eee;}
            .items tfoot{background:#ddd;}
            .items th{padding:10px;}
            .items td{padding:10px;}

            h1 small{display:block;font-size:16px;color:#888;}

            table{width:100%;}
            .text-right{text-align:right;}
        </style>
    </head>
    <body>

    <div class="header">
        <h1>
                   ASOCIACIÓN APICULTORES DE NICOYA
         <small>
             Tipo de Comprobante:{{$ingresos->tipo_comprobante}}
            </small>
         <small>
                Serie Comprobante: {{$ingresos->serie_comprobante}}
            </small>
            <small>
                Numero Comprobante: {{$ingresos->idingreso_inventario}}
            </small>
            <small>
                tipo de pago: {{$ingresos->tipo_pago}}
            </small>
            <small>
                Emitido el: {{ $ingresos->fecha_hora }}
            </small>
            <small>
                Estado: {{ $ingresos->estado }}
            </small>
        </h1>
    </div>

    <table class="client-detail">
        <tr>
            <th style="width:100px;">
               Afiliado:
            </th>
            <td>{{$ingresos->Nombre}} {{$ingresos->apellido1}} {{$ingresos->apellido2}}</td>
        </tr>
        <tr>
            <th style="width:100px;">
               Usuario:
            </th>
            <td>{{$ingresos->name}}</td>
        </tr>
    </table>

    <hr />

    <table class="items">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>cantidad utilizada</th>
                <th>descuento</th>
               
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
       @foreach($detalles as $det)
            <tr>
                <td>{{$det->stocks}}</td>
                <td>{{$det->Precio}}</td>
                <td>{{$det->cantidad}}</td>
                <td>{{$det->descuento}}</td>
              
                 <td>{{(($det->cantidad*$det->Precio)-(($det->cantidad*$det->Precio)-$det->descuento))}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>Total:</b></td>
            <th><h4 id="total_venta">{{$ingresos->total_venta}}</h4></th>
        </tr>
        <tr>
          
        </tr>
        
        </tfoot>
    </table>
    </body>
</html>