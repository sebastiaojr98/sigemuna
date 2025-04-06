<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>licenciamento</title>
        <style>

            *{
                font-family: sans-serif;
                font-size: 10pt;
                font-weight: 500;
                line-height: 20px;
                box-sizing: border-box;
            }

            h6{
                font-weight: bold;
                line-height: 8px;
            }

            .nome-licenca{
                font-weight: bold;
                line-height: 30px;
                text-align: center;
            }

            #invoice .div-principal {
                background-color: #ffffffe0;
                border: solid 35px #0a750a;
                padding: 40px;
                background-image: url({{$logo_cmcn}});
                background-size: 70%;
                background-position: 70px;
                background-repeat: no-repeat;
            }

            #invoice p {
                font-size: 11pt;
                color: #000;
                line-height: 10px;
                text-align: justify;
            }

            #invoice strong {
                font-weight: bold;
            }

            #invoice span {
                color: red;
            }

            .table-sistem {
                width: 100%;
                border-collapse: collapse;
                margin-top: 3px;
            }

            .table-sistem th,
            .table-sistem td {
                border: 2px solid #0a750a;
                padding: 0 3px;
                font-weight: 400;
            }

            .table-sistem th {
                color: #fff;
                background-color: #0a750a;
            }
        </style>
    </head>

    <body>
        <div id="invoice">

            <div class="div-principal">
                <div style="background-color: #ffffffde; color: #000000e0; width: 100%; height: 100%;">
                    <div style="width: 40%; float: left; text-align: center;">
                        <img src="{{$logo_cmcn}}" style="width: 50px;">
                        <h6>Municipio de Nampula</h6>
                        <h6>Conselho Municipal</h6>
                    </div>
                    <div style="width: 40%; float: right; text-align: center;">
                        <img src="{{$logo_emusana}}" style="width: 85px;">
                        <h6>Decreto N<sup>o</sup> <span style="color: #df1717; font-weight: bold;">51/2015</span></h6>
                        <h6>De 31 de Dezembro</h6>
                    </div>
                    <div style="width: 100%; float: leftx; margin-top: 250px;">
                        <h1 class="nome-licenca">LICENÇA DE {{strtoupper($license->license->name)}}</h1>
                        <h1 style="margin-top: 30px; font-weight: bold;">Licença N<sup>o</sup> {{$license->reference}} / EMUSANA / {{ date("d/m/Y", strtotime($license->issue_date)) }}</h1>

                        @if ($license->car_brand)
                            <p style="text-align: justify; line-height: 25px; font-weight: 400;">Nos termos de regulamento do licenciamento de abastecimento e transporte de água potável por fornecedores privados, é concedida a licença de transporte de água potável a <strong>{{ $license->client->full_name }}</strong> com o número Único de Identificação Tributaria (NUIT) <strong>{{$license->client->nuit}}</strong>, proprietária da viatura de marca <strong>{{$license->car_brand}}</strong>, modelo <strong>{{$license->car_model}}</strong>, matricula <strong>{{$license->car_registration}}</strong>, com práticas de atividade no Distrito Municipal de Nampula, de acordo com as condições gerais fixadas no presente documento.</p>
                        @else
                            <p style="text-align: justify; line-height: 25px; font-weight: 400;">Nos termos de regulamento do licenciamento de abastecimento e transporte de água potável por fornecedores privados, é concedida a licença de abastecimento de água potável a <strong>{{ $license->client->full_name }}</strong> com o número Único de Identificação Tributaria (NUIT) <strong>{{$license->client->nuit}}</strong>, localizada no Bairro de <strong>{{$license->communal_unit->neighborhood->label}}</strong>, Unidade Comunal <strong>{{$license->communal_unit->label}}</strong>, Quarteirão <strong>N<sup>o</sup> {{$license->block}}</strong>, Casa <strong>N<sup>o</sup> {{$license->house_number}}</strong>, com práticas de atividade no Distrito Municipal de Nampula, de acordo com as condições gerais fixadas no presente documento.</p>
                        @endif

                        <p style="text-align: justify; line-height: 25px; font-weight: 400;">A presente licença, foi emitida em {{ date("d/m/Y", strtotime($license->issue_date)) }} e valida ate {{ date("d/m/Y", strtotime($license->due_date)) }}, susceptível de renovação por período igual, de acordo com a legislação aplicável, e não condiciona a expansão de infraestruturas públicas na área do projecto da presente licença.</p>

                        <p style="color: #000; text-align: center; margin-top: 110px;">Nampula, _____ de _____________________ de 20_____</p>

                        <p style="color: #000; text-align: center; font-weight: bold;">O Presidente</p>
                        <p style="color: #000; text-align: center; font-weight: bolder;">____________________________________</p>
                        <p style="color: #000; text-align: center; font-weight: bold;">Luís Abdula Giquira</p>

                        <div style="position: absolute;">
                            <div style="position: relative">
                                <img src="{{$seal}}" alt="" style="width: 100px; position: absolute; right: -410px; top: -120px;">
                                <img src="{{$qrcode}}" alt="" style="width: 70px; position: absolute; right: -395px; top: -82px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-principal">
                <div style="background-color: #ffffffde; width: 100%; height: 100%;">
                    <div style="width: 95%; border: 1px dashed #0a750a; padding: 0 13px;">
                        <p style="font-size: 8pt; line-height: 17px; font-family: sans-serif; font-weight: 400;">
                            <span style="color: #000;">Condições Gerais</span><br>
                            Complementaridade dos pequenos fornecedores privados de água ao papel do estado de provedor do serviço público de abastecimento de água as populações. <br>
                            Expansão de infra-estruturas públicas de abastecimento de água na área objecto da presente licença. <br>
                            Respeito pela saúde pública e os critérios de potabilidade fixada pelo Ministério da Saúde (entendida a potabilidade como sendo água que cumpra com os requisitos constantes da legislação aplicável) <br>
                            Regulação pela entidade reguladora do Abastecimento de Água <br>
                            Inspecções, pelas entidades competentes, aos serviços prestados pelos fornecedores privados de água.
                        </p>
                    </div>
                    <table class="table-sistem" style="margin-top: 30px;">
                        <tr style="background-color: #0a750a;">
                            <th style="color: #fff; font-size: 12pt; font-weight: bolder;">Requisitos a Cumprir</th>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Fornecimento e Qualidade de Água</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">1. Assegurar o fornecimento de água potável durante um mínimo de 16 (dezasseis) por dia</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">2. Água deve respeitar os critérios de qualidade de acordo com o Ministério de Saúde (Diploma Ministerial do Ministério da Saúde no 180/2004).</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">3. Fornecedor deve testar a água trimestralmente de forma autónoma (diploma Ministerial de Saúde no 180/2004, de 15 de Setembro), ou em períodos mais curtos sempre que as circunstâncias o exigir.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">4. Protecção da área de superfície de terreno contiguo a captação de água para impedir infiltrações e contaminações, não sendo permitido o desenvolvimento de actividades, num raio de 20 metros, que constituem foco de contaminação. (regulamento dos serviços públicos de distrital de água e de drenagem de águas residuais de Moçambique, Artigo 3º 12º).</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Tarifa</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">5. Dos fornecedores de água a sua revisão serão propostas a entidade reguladora do abastecimento de água.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Relatório Cobre o Serviço</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">6. O fornecedor devera assegurar uma base de informação trimestral, nomeadamente, quanto a: no de consumidores servidos; qualidade da água; no de testagens efectuadas; no de reclamações efectuadas; no depedidos de novas ligações; facturarão com base na leitura real; no de fontenários operacionais.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Atendimento ao cliente</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">7. O fornecedor obriga-se respeitar o tempo máximo de 10 dias como tempo de resposta para todas as solicitações efectuadas.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Resolução de Conflito</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">8. Os eventuais conflitos entre o fornecedor o consumidor serão resolvidos se necessário, com recursos a mediação das associações de fornecedores de água com recurso a entidade reguladora. Os conflitos entre fornecedores e entidade emissora da licença serão mediados pelo regulador</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Condições de Higiene</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">9. O fornecedor obriga-se a assegurar as condições de higiene nos seguintes termos: limpeza constante da fonte de captação, drenagem das águas paradas e outras inerentes a preservação da saúde pública.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10pt; text-align: center; font-weight: bolder;">Incumprimentos</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">10. A licença é intransmissível e é valida somente para os sistemas licenciados.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt;">11. Os infanções cometidos na vigência desta licença são sancionados com multas, suspensão e revogação conforme o regulamento de licenciamento de abastecimento de água potável por fornecedores privados.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>