<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo {{ $revenue->reference }}</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            font-weight: 400;
        }

        html{
            margin: 2cm 1.5cm 2cm 1.5cm;
        }

        header{
            width: 100%;
        }

        header h3, h1{
            font-weight: bold;
        }

        header h5{
            line-height: 15px;
            font-size: 7pt;
        }

        span.bold{
            font-weight: bold;
        }

        table, th, td{
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
            font-size: 6pt;
            padding: 2.5px 10px;
        }

        table, th{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div style="width: 70%; float: left;">
            <div style="width: 100%;">
                <img src="{{$revenue->logo}}" style="width: 100px; margin-left: 90px;">
            </div>
            <h5><span class="bold">Endereço:</span> Nampula, Estrada Nacional Número 1, Unidade Comunal Namaterra</h5>
            <h5><span class="bold">Telefone:</span> +258 84 521 6358</h5>
            <h5><span class="bold">Nuit:</span> 4589675831</h5>
            <h5><span class="bold">Email:</span> info@emusana.org.mz</h5>
        </div>
        <div style="width: 25%; float: right;">
            <h1 style="margin-bottom: 10px; font-size: 12pt;">RECIBO</h1>
            <h5><span class="bold">DATA:</span> {{date("d/m/Y", strtotime($revenue->revenue_date))}}</h5>
            <h5><span class="bold">RECIBO:</span> {{$revenue->reference}}</h5>
        </div>
    </header>
    <div style="width: 100%; margin-top: 170px;">
        <table style="width: 100%; margin-bottom: 25px;">
            <tr style="background-color: #00ccff;">
                <th>NÚMERO DO PROCESSO</th>
                <th>ENTIDADE/PESSOA FÍSICA</th>
                <th>PLANO ORÇAMENTÁRIO</th>
            </tr>
            <tr>
                <td>{{ $revenue->process_number }}</td>
                <td>{{ $revenue->client->full_name }}</td>
                <td>Recita Interna</td>
            </tr>
        </table>

        <table style="width: 100%;">
            <tr style="background-color: #b1b1b1;">
                <th>REFERENTE</th>
                <th style="text-align: center;">FORMA DE PAGAMENTO</th>
                <th>MONTANTE (MT)</th>
            </tr>
            <tr>
                <td>{{ $revenue->typeRevenue->label }}</td>
                <td style="text-align: center;">{{ $revenue->form_payment->label }}</td>
                <td>{{number_format($revenue->amount, 2, '.', ' ')}}</td>
            </tr>
            <tr>
                <th colspan="3" style="text-align: center;">{{$revenue->description}}</th>
            </tr>
        </table>
        
        <div style="width: 100%; float: left; margin-top: 70px;">
            <div style="width: 35%; float: left; text-align: center;">
                <div style="width: 100px; margin-top: -25px;">
                    <img src="{{ $revenue->qrcode }}" style="width: 70px; margin-left: 90px;">
                </div>
            </div>
            <div style="width: 65%; float: right; text-align: center;">
                <div style="border-top: 1px solid #000; width: 85%; margin: 0 auto 5px auto;"></div>
                <p style="margin-bottom: 5px; font-size: 8pt;">{{ auth()->user()->name }}</p>
                <p style="font-size: 6pt; font-style: italic; font-wight: 200;">Processada por Computador: {{ date('d/m/Y h:i:s') }}</p>
            </div>
        </div>
    </div>
</body>
</html>