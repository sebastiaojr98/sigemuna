<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Relatorio  de infraestruturas</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            font-weight: 400;
        }

        html{
            margin: 2cm 2cm 2cm 2cm;
        }

        header{
            text-align: center;
        }

        header img{
            width: 100px;
        }

        header h1, h2{
            font-size: 10pt;
            line-height: 20px;
        }

        header .title{
            font-size: 15pt;
            font-weight: bold;
            margin-top: 35px;
        }

        .sub-header{
            width: 100%;
            margin-top: 35px;
        }

        .sub-header table{
            float: right;
        }
        table, th, td{
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
            font-size: 10pt;
            padding: 2.5px 10px;
        }

        .body{
            width: 100%;
            margin-top: 50px;
        }

        .body h1, .div-total h1{
            font-size: 12pt;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .table-movement, .table-total{
            width: 100%;
            margin-top: 10px;
        }

        .table-movement th, .table-total th{
            font-weight: bold;
        }

        .table-movement th, td{
            font-size: 8pt;
        }

        .div-total{
            width: 50%;
            margin-top: 15px;
            float: right;
        }
        
        .table-total th, td{
            font-size: 8pt;
        }

        .assinature{
            width: 100%;
            text-align: center;
        }
        .assinature .hr{
            border-top: 1px solid #ccc;
            width: 70%;
            margin: 50px auto 10px auto;
        }

        .assinature p{
            font-size: 8pt;
            line-height: 25px;
        }
    </style>
</head>
<body>
    <header>
        <div style="width: 100%;">
            <div style="float: left;">
                <img src="{{$logo_cmcn}}" style="width: 80px;">
                <h5 style="font-size: 13pt; margin-top: 10px;">Municipio de Nampula</h5>
                <h5 style="font-size: 13pt;">Conselho Municipal</h5>
            </div>
            <div style="float: right;">
                <img src="{{$logo}}" style="width: 170px;">
            </div>
            <div style="width: 100%; margin-top: 180px;">
                <h3 style="font-weight: bold;">DIRECÇÃO DO RECURSOS HUMANOS</h3>
                <h3 style="margin-top: 10px;">Servicos de Drenagem de Aguas Pluviais e Residuais</h3>
                <h3 style="margin-top: 10px;">LISTA NOMINAL DE INFRAESTRUTURAS</h3>
            </div>
        </div>
        
    </header>

    

    <div class="body">
        <table class="table-movement">
            <tr style="background-color: rgb(0, 191, 255);">
                <th>ORDEM</th>
                <th>CÓDIGO</th>
                <th scope="col">TIPO DE INFRAESTRUTURA</th>
                <th scope="col">ANO</th>
            </tr>
            @foreach ($infras as $key => $infra)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $infra->code }}</td>
                    <td>{{ $infra->infrastructureType->label}}</td>
                    <td>{{ $infra->year }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="div-total">
        {{--<table class="table-total">
            <tr style="background-color: #b1b1b1;">
                <th>Género</th>
                <th>TOTAL</th>
            </tr>
            <tr>
                <td>Homens</td>
                <td>{{$men <= 9 ? "0".$men : $men}}</td>
            </tr>
            <tr>
                <td>Mulheres</td>
                <td>{{$women <= 9 ? "0".$women : $women}}</td>
            </tr>
            <tr>
                <td><span style="font-weight: bold;">TOTAL</span></td>
                <td>{{$women + $men <= 9 ? "0".$women + $men : $women + $men}}</td>
            </tr>
        </table>
        
        <br>

        <table class="table-total">
            <tr>
                <td>Departamento</td>
                <td>{{$filter_department}}</td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>{{$filter_gender}}</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{$filter_condition_type}}</td>
            </tr>
        </table>--}}

        <div class="assinature">
            <div class="hr"></div>
            <p style="margin-bottom: 5px; font-size: 8pt;">{{auth()->user()->name}}</p>
            <p style="font-size: 6pt; font-style: italic; font-wight: 200;">Processada por Computador: {{ date('d/m/Y h:i:s') }}</p>
        </div>
    </div>

</body>
</html>