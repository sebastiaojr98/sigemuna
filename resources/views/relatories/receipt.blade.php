<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RECIBO</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body{
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .header-wave{
            width: 100%;
            height: 150px;
            position: relative;
        }

        .wave{
            width: 100%;
            height: 130px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .wave-2{
            width: 100%;
            height: 170px;
            position: absolute;
            top: 0;
            left: 0;
            color: #007affad;
            z-index: 99;
        }

        .header{
            padding: 25px 50px;
        }

        .header-logo{
            width: 100px;
        }
        
        .header-left{
            float: left;
        }

        .header-right{
            float: right;
        }

        .to-from{
            padding: 25px 50px;
            margin: 65px 0;
            width: 100%;
            position: relative;
        }

        .from{
            float: left;
            margin-right: 35px; 
            width: 57%;
        }

        .to{
            float: right;
            width: 40%;
        }

        .invoice-detail{
            float: right;
        }
        
        .text-other{
            color: #000000ab;
            line-height: 25px;
            font-size: 10pt;
        }


        .content{
            width: 100%;
            padding: 25px 0;
            margin-top: 100px;
        }

        table{
            width: 100%;
        }

        table, tr{
            border: 1px solid transparent;
            border-collapse: collapse;
        }


        th, td{
            height: 45px;
            text-align: center;
        }

        th{
            color: #ffffff;
            font-size: 11pt;
        }

        td{
            color: #000000a9;
            font-size: 11pt;
        }

        .terms{
            padding: 25px 50px;
            margin-top: 30px;
            width: 50%;
        }

        .terms h1{
            font-size: 12pt;
            color: #007aff;
        }

        .terms ul{
            margin-left: 25px;
            margin-top: 10px;
        }

        .terms ul li{
            font-size: 10pt;
            color: #000000a9;
        }

        .terms  p{
            font-size: 12pt;
            margin-top: 10px;
            color: #000000a9;
        }

        .signature{
            width: 45%;
            text-align: center;
            margin-top: 150px;
            position: relative;
            right: -450px;
            top: -200px;
        }

        .footer{
            border-top: 1px solid #007aff;
            position: relative;
            bottom: 0px;
            left: 0;
            text-align: center;
            padding: 0 100px;
        }
    </style>
</head>
<body>
    <div class="header-wave">
        <img src="{{waveRightBase64()}}" alt="" class="wave">
        <img src="{{waveLeftBase64()}}" alt="" class="wave-2">
    </div>

    <div class="header">
        <div class="header-left">
            <h1 style="font-size: 30pt; font-weight: bolder; color: #007aff;">RECIBO <span style="font-size: 15pt;"></span></h1>
            <p style="font-weight: bolder; color: #007aff;">#{{$receipt->id}}</p>
        </div>
        <div class="header-right">
            <img class="header-logo" src="{{logoBase64()}}" alt="">
        </div>
    </div>

    <div class="to-from">
        <div class="from">
            <p style="color: #007aff; font-weight: bolder; margin-bottom: 10px;">EMUSANA</p>
            <p class="text-other">NUIT: 4589675831</p>
            <p class="text-other">Telf: +258 84 521 6358</p>
            <p class="text-other" style="color: #007aff;">E-mail: info@emusana.co.mz</p>
            <p class="text-other">Endereço: Nampula, Estrada Nacional Número 1, Unidade Comunal Namaterra</p>
        </div>
        <div class="to">
            <p style="color: #007aff; font-weight: bolder; margin-bottom: 10px;">PARA</p>
            <p class="text-other">{{$receipt->invoice->customer->name}}</p>
            <p class="text-other">{{formatNumberMoz($receipt->invoice->customer->phone)}}</p>
        </div>
    </div>


    <div class="content">
        <table style="margin-top: 25px;">
            <thead style="height: 25px;">
                <tr style="background-color: #007aff; border-bottom: none;">
                    <th style="text-align: left; padding-left: 50px;" colspan="2">Descrição</th>
                    <th style="text-align: right; padding-right: 50px;" colspan="2">Valor Pago</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #ccccccb2;">
                    <td style="text-align: left; padding-left: 50px;" colspan="2">{{$receipt->invoice->serviceContracted->service->name}}</td>
                    <td style="text-align: right; padding-right: 50px;" colspan="2">MZN {{formatAmount($receipt->amount_paid)}}</td>
                </tr>
                <tr style="margin-top: 35px;">
                    <td></td>
                    <td></td>
                    <td style="background-color: #007aff; color: #fff;">Divida</td>
                    <td style="background-color: #007aff; text-align: right; padding-right: 50px; color: #fff;">
                        MZN {{formatAmount(($receipt->accountReceivable->amount_due - $receipt->accountReceivable->amount_paid))}}</td>
                </tr>
            </tbody>
        </table>

        <div style="display: inline;">
            <div class="terms">
                <h1 style="font-size: 12pt;">Método de Pagamento</h1>
                <ul>
                    <li>Forma de Pagamento: <strong>{{$receipt->paymentMethod->label}}</strong></li>
                    <li>Data do Pagamento: <strong>{{date("d-m-Y", strtotime($receipt->payment_date))}}</strong></li>
                    <li>FACTURA: <strong>{{$receipt->invoice->number}}</strong></li>
                </ul>
            </div>
    
            <div class="signature">
                <p style="color: #0000009a">______________________________</p>
                <p style="color: #000000; font-size: 11pt;">{{ auth()->user()->name }}</p>
                <p style="color: #0000009a; font-size: 8pt; margin-top: 5px;"><em>Processado(a) por SIGEMUNA: {{date('d-m-y H:i:s')}}</em></p>
            </div>
        </div>
    </div>

    <div class="footer">
        <h1 style="font-size: 11pt; margin-top: 10px;">Declaração de Confirmação</h1>
        <p style="font-size: 8pt; text-align: center; color: #0000009a; margin-top: 5px;">
            Este documento comprova o pagamento integral do valor mencionado. Em caso de divergências, favor
contactar nossa equipe dentro de 5 dias úteis.
        </p>
    </div>
</body>
</html>