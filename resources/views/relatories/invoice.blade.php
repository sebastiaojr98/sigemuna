<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
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
            width: 60%;
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
            bottom: -30px;
            left: 0;
            text-align: center;
            padding: 0 100px;
        }
    </style>
</head>
<body>
    <div class="header-wave">
        <img src="data:image/webp;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMTQ0MCAzMjAiPjxwYXRoIGZpbGw9IiNmMWI1MDciIGZpbGwtb3BhY2l0eT0iMSIgZD0iTTAsMjU2TDQ4LDI0MEM5NiwyMjQsMTkyLDE5MiwyODgsMTg2LjdDMzg0LDE4MSw0ODAsMjAzLDU3NiwyMTguN0M2NzIsMjM1LDc2OCwyNDUsODY0LDIyOS4zQzk2MCwyMTMsMTA1NiwxNzEsMTE1MiwxMzMuM0MxMjQ4LDk2LDEzNDQsNjQsMTM5Miw0OEwxNDQwLDMyTDE0NDAsMEwxMzkyLDBDMTM0NCwwLDEyNDgsMCwxMTUyLDBDMTA1NiwwLDk2MCwwLDg2NCwwQzc2OCwwLDY3MiwwLDU3NiwwQzQ4MCwwLDM4NCwwLDI4OCwwQzE5MiwwLDk2LDAsNDgsMEwwLDBaIj48L3BhdGg+PC9zdmc+" alt="" class="wave">
        <img src="data:image/svg;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMTQ0MCAzMjAiPjxwYXRoIGZpbGw9IiNmMWI2MDdhZCIgZmlsbC1vcGFjaXR5PSIxIiBkPSJNMCw2NEw2MCw5MC43QzEyMCwxMTcsMjQwLDE3MSwzNjAsMTk3LjNDNDgwLDIyNCw2MDAsMjI0LDcyMCwxOTJDODQwLDE2MCw5NjAsOTYsMTA4MCwxMDYuN0MxMjAwLDExNywxMzIwLDIwMywxMzgwLDI0NS4zTDE0NDAsMjg4TDE0NDAsMEwxMzgwLDBDMTMyMCwwLDEyMDAsMCwxMDgwLDBDOTYwLDAsODQwLDAsNzIwLDBDNjAwLDAsNDgwLDAsMzYwLDBDMjQwLDAsMTIwLDAsNjAsMEwwLDBaIj48L3BhdGg+PC9zdmc+" alt="" class="wave-2">
    </div>

    <div class="header">
        <div class="header-left">
            <h1 style="font-size: 30pt; font-weight: bolder; color: #00CBA9;">FACTURA <span style="font-size: 15pt;"></span></h1>
            <p style="font-weight: bolder; color: #00CBA9;">N.º #00-170</p>
        </div>
        <div class="header-right">
            <img class="header-logo" src="{{logoBase64()}}" alt="">
        </div>
    </div>

    <div class="to-from">
        <div class="from">
            <p style="color: #00CBA9; font-weight: bolder; margin-bottom: 10px;">EMUSANA</p>
            <p class="text-other">NUIT: 4589675831</p>
            <p class="text-other">Telf: +258 84 521 6358</p>
            <p class="text-other" style="color: #008c64;">E-mail: info@emusana.co.mz</p>
            <p class="text-other">Endereço: Nampula, Estrada Nacional Número 1, Unidade Comunal Namaterra</p>
        </div>
        <div class="to">
            <p style="color: #00CBA9; font-weight: bolder; margin-bottom: 10px;">PARA</p>
            <p class="text-other">Sebastião WEB</p>
        </div>
    </div>


    <div class="content">
        <table>
            <thead style="height: 25px;">
                <tr style="background-color: #007aff; border-bottom: none;">
                    <th style="text-align: left; padding-left: 50px;">DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO UNIT</th>
                    <th style="text-align: right; padding-right: 50px;">PREÇO TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #ccccccb2;">
                    <td style="text-align: left; padding-left: 50px;">Inscricao curso basico de Informatica</td>
                    <td>1</td>
                    <td>MZN 1 800.00</td>
                    <td style="text-align: right; padding-right: 50px;">MZN 1 800.00</td>
                </tr>
                <tr style="margin-top: 35px;">
                    <td></td>
                    <td></td>
                    <td style="background-color: #007aff; color: #fff;">Total</td>
                    <td style="background-color: #007aff; text-align: right; padding-right: 50px; color: #fff;">MZN 2 100.00</td>
                </tr>
            </tbody>
        </table>

        <div style="display: inline;">
            <div class="terms">
                <h1>NOTA</h1>
                <p style="font-size: 10; line-height: 15px;">O pagamento desta fatura poderá ser efetuado por depósito ou transferência bancária utilizando os seguintes dados:</p>
                <ul>
                    <li>Banco: </li>
                    <li>Titular da Conta: </li>
                    <li>Número da Conta: </li>
                    <li>NIB: </li>
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
        <h1 style="font-size: 11pt; margin-top: 10px;">Termos e Condições de Pagamento</h1>
        <p style="font-size: 8pt; text-align: center; color: #0000009a; margin-top: 5px;">
            O valor não é reembolsável, incluindo erros cometidos pelo cliente, como depósitos ou transferências incorretas. É responsabilidade do
cliente verificar os dados antes do pagamento.
        </p>
    </div>
</body>
</html>