<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Relatorio  de Financeiro</title>
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
                <h3 style="font-weight: bold;">DIRECÇÃO ADMINISTRATIVA / CONTABILIDADE</h3>
                <h3 style="margin-top: 10px;">INVENTÁRIO DE DESPESAS</h3>
            </div>
        </div>
        
    </header>

    

    <div class="body">
        <p style="text-align: right; font-size: 12pt; margin-right: 10px;">Periodo: {{ date("d/m/Y", strtotime($start_date)) }} a {{ date("d/m/Y", strtotime($end_date)) }}</p>
        <table class="table-movement">
            <tr style="background-color: rgb(0, 191, 255);">
                <th>ORDEM</th>
                <th>CÓDIGO</th>
                <th scope="col">TIPO DE DESPESA</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">MONTANTE</th>
                <th scope="col">DATA</th>
            </tr>

            @forelse ($expenses as $key => $expense)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $expense->reference }}</td>
                <td>{{ $expense->typeExpense->label }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ number_format($expense->amount, 2, ".", " ") }} MT</td>
                <td>{{ date("d/m/Y", strtotime($expense->expense_date)) }}</td>
            </tr>
            @empty
            <tr>
                <td>---</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>
            </tr>
            @endforelse

        </table>
    </div>

    <div class="div-total">
        <table class="table-total">
            <tr style="background-color: #b1b1b1;">
                <th>Descrição {{$expense_type}}</th>
                <th style="text-align: right;">Montante</th>
            </tr>
            @if ($expense_type == "Todos")
                @foreach ($expense_types as $type)
                    <tr>
                        <td>{{$type->label}}</td>
                        <td style="text-align: right;">{{ $type->amount ? number_format($type->amount, 2, ".", " ") : number_format(0, 2, ".", " ") }} MT</td>
                    </tr>
                @endforeach
            @else
                @foreach ($expense_types as $type)
                    @if ($type->label == $expense_type)
                        <tr>
                            <td>{{$type->label}}</td>
                            <td style="text-align: right;">{{ $type->amount ? number_format($type->amount, 2, ".", " ") : number_format(0, 2, ".", " ") }} MT</td>
                        </tr>
                    @endif
                @endforeach
            @endif
            <tr style="background-color: #00c24a; color: #fff;">
                <td style="font-weight: bold;">TOTAL</td>
                <td style="text-align: right;">{{number_format($total, 2, ".", " ")}} MT</td>
            </tr>
        </table>
        
        <br>

        <div class="assinature">
            <div class="hr"></div>
            <p style="margin-bottom: 5px; font-size: 8pt;">{{auth()->user()->name}}</p>
            <p style="font-size: 6pt; font-style: italic; font-wight: 200;">Processada por Computador: {{ date('d/m/Y h:i:s') }}</p>
        </div>
    </div>

</body>
</html>