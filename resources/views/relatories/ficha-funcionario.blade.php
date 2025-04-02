<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FICHA DO PROCESSO INDIVIDUAL</title>
    <style>
        .principal{
            width: 100%;
            height: 1028px;
            text-align: center;
            box-sizing: border-box;
        }

        .principal:first-child{
            border: 1px solid green;
        }

        .embelema{
            width: 80px;
            margin-top: 70px;
        }
        .principal h1{
            font-size: 12pt;
        }

        .principal .body{
            margin-top: 70px;
        }

        .principal .body h1{
            font-size: 14pt;
        }

        .principal .footer{
            position: absolute;
            bottom: 0;
            text-align: center;
            left: 190px;
        }


        table {
            width: 97%;
            border-collapse: collapse;
            margin: 10px 10px;
            text-align: justify;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 5px;
            font-weight: 400;
            font-size: 10pt !important;
        }

        table th {
            color: #000;
    
        }
    </style>
</head>
<body>
    <div class="principal">
        <div class="header">
            <img src="{{$employee->logo}}" class="embelema">
            <h1>REPÚBLICA DE MOÇAMBIQUE</h1>
            <h1>GOVERNO MUNICIPAL DA CIDADE DE NAMPULA</h1>
            <h1>EMPRESA MUNICIPAL DE SANEAMENTO DE NAMPULA</h1>
            <h1>REPARTICAO DE RECURSOS HUMANOS</h1>
        </div>
        <div class="body">
            <h1>SISTEMA NACIONAL DE GESTAO DE RECURSOS HUMANOS DO ESTADO(SNGRHE)</h1>
            <h1 style="font-size: 35pt; margin-top: 85px;">FICHA DO PROCESSO INDIVIDUAL</h1>
        </div>
        <div class="footer">
            <h1 style="font-size: 11pt;">Ficha para actualizacao de dados dos FAE no e-SNGRHE</h1>
        </div>
    </div>

    <div class="principal">
        <table>
            <tr>
                <th colspan="5" style="font-weight: bold;">DADOS PESSOAIS</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Codigo</th>
                <th colspan="2" style="color: #fff;">Nomes Proprios</th>
                <th style="color: #fff;">Apelido</th>
                <th style="color: #fff;">Data de Nascimento</th>
            </tr>
            <tr>
                <td style="text-align: center;">{{$employee->code}}</td>
                <td colspan="2" style="text-align: center;">{{$employee->first_name}}</td>
                <td style="text-align: center;">{{$employee->last_name}}</td>
                <td style="text-align: center;">{{date("d/m/Y", strtotime($employee->birth))}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="5" style="text-align: center; font-weight: bold;">FILIAÇÃO</th>
            </tr>
            <tr style="background-color: green;">
                <th colspan="3" style="color: #fff;">Nome do Pai</th>
                <th colspan="2" style="color: #fff;">Nome da Mae</th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">{{$employee->father_name}}</td>
                <td colspan="2" style="text-align: center;">{{$employee->name_mother}}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th style="text-align: center">Nacionalidade</th>
                <th style="padding: 0;">
                    <table>
                        <tr>
                            <th colspan="2" style="text-align: center; border: none;">Local de Nascimento</th>
                        </tr>
                        <tr>
                            <td style="border: none;">Provincia</td>
                            <td style="border: none;">Distrito</td>
                        </tr>
                    </table>
                </th>
                <th style="text-align: center">Nacionalidade Estrangeira</th>
                <th style="text-align: center">Sexo</th>
                <th style="text-align: center">Altura(m)</th>
            </tr>
            <tr>
                <td style="text-align: center">{{$employee->nationality->description}}</td>
                <td style="padding: 0;">
                    <table>
                        <tr>
                            <td style="border: none;">{{$employee->province->label}}</td>
                            <td style="border: none;">{{$employee->district->label}}</td>
                        </tr>
                    </table>
                </td>
                <td style="text-align: center">---</td>
                <td style="text-align: center">{{$employee->gender->label}}</td>
                <td style="text-align: center">{{$employee->height}}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th colspan="5" style="font-weight: bold;">RESIDENCIA</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Posto Administrativo</th>
                <th style="color: #fff;">Bairro</th>
                <th style="color: #fff;">Unidade Comunal</th>
                <th style="color: #fff;">Quarteirao</th>
                <th style="color: #fff;">Casa</th>
            </tr>
            @foreach ($employee->employeeAddress as $address)
            <tr>
                <td style="text-align: center;">{{$address->administrativePost->label}}</td>
                <td style="text-align: center;">{{$address->neighborhood->label}}</td>
                <td style="text-align: center;">{{{$address->communalUnity->label}}}</td>
                <td style="text-align: center;">{{$address->block_number}}</td>
                <td style="text-align: center;">{{$address->house_number}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th colspan="5" style="font-weight: bold; text-align: center;">ESTADO CIVIL</th>
            </tr>
            <tr style="background-color: green;">
                <td colspan="5" style="text-align: center; color: #fff;">{{$employee->maritalStatus->description}}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th colspan="5" style="text-align: center; font-weight: bold;">CONJUGE</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Nome Completo</th>
                <th style="color: #fff;">Nacionalidade</th>
                <th style="color: #fff;">Data de Nascimento</th>
                <th style="color: #fff;">Profissao</th>
                <th style="color: #fff;">Local de Trabalho</th>
            </tr>
            @if ($employee->spouse)
            <tr>
                <td style="text-align: center;">{{$employee->spouse->full_name}}</td>
                <td style="text-align: center;">{{$employee->spouse->nationality->description}}</td>
                <td style="text-align: center;">{{$employee->spouse->birth}}</td>
                <td style="text-align: center;">{{$employee->spouse->profession}}</td>
                <td style="text-align: center;">{{$employee->spouse->workplace}}</td>
            </tr>
            @else
            <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            @endif
        </table>

        <table>
            <tr>
                <th colspan="7" style="text-align: center; font-weight: bold;">AGREGADO FAMILIAR</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Nome Completo</th>
                <th style="color: #fff;">Grau de Parentesco</th>
                <th style="color: #fff;">Data de Nascimento</th>
                <th style="color: #fff;">Sexo</th>
                <th style="color: #fff;">Estado Civil</th>
                <th style="color: #fff;">Profissao</th>
                <th style="color: #fff;">Local de Trabalho</th>
            </tr>
            @foreach ($employee->households as $household)
            <tr>
                <td>{{$household->full_name}}</td>
                <td>{{$household->degreeOfKinship->label}}</td>
                <td>{{$household->birth}}</td>
                <td>{{$household->gender->label}}</td>
                <td>{{$household->maritalStatus->label}}</td>
                <td>{{$household->profession ? $household->profession : "---"}}</td>
                <td>{{$household->workplace ? $household->workplace : "---"}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th colspan="5" style="text-align: center; font-weight: bold;">DOMICILIO BANCARIO</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Banco</th>
                <th style="color: #fff;">Conta Bancaria</th>
                <th style="color: #fff;">NIB</th>
                <th style="color: #fff;">Cartao</th>
                <th style="color: #fff;">Validade</th>
            </tr>
            @if ($employee->employeeBankingDomicile)
            <tr>
                <td style="text-align: center;">{{$employee->employeeBankingDomicile->bankCardIssue->description}}</td>
                <td style="text-align: center;">{{$employee->employeeBankingDomicile->account_number}}</td>
                <td style="text-align: center;">{{$employee->employeeBankingDomicile->nib}}</td>
                <td style="text-align: center;">{{$employee->employeeBankingDomicile->card_number}}</td>
                <td style="text-align: center;">{{$employee->employeeBankingDomicile->validity}}</td>
            </tr>
            @else
            <tr>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr> 
            @endif
        </table>

        <table>
            <tr>
                <th colspan="5" style="text-align: center; font-weight: bold;">DOCUMENTOS</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Tipo</th>
                <th style="color: #fff;">Numero</th>
                <th style="color: #fff;">Local de Emissao</th>
                <th style="color: #fff;">Data de Emissao</th>
                <th style="color: #fff;">Data de Validade</th>
            </tr>
            @forelse ($employee->myDocuments as $document)
            <tr>
                <td style="text-align: center;">{{$document->documentType->label}}</td>
                <td style="text-align: center;">{{$document->number}}</td>
                <td style="text-align: center;">{{$document->place_of_issue}}</td>
                <td style="text-align: center;">{{$document->date_of_issue}}</td>
                <td style="text-align: center;">{{$document->expiration_date}}</td>
            </tr>
            @empty
            <tr>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr>
            @endforelse
        </table>

        <table>
            <tr>
                <th colspan="5" style="text-align: center; font-weight: bold;">QUALIFICAÇÕES ACADÊMICAS</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Nível Acadêmico</th>
                <th style="color: #fff;">Ano de Conclusão</th>
                <th style="color: #fff;">Curso</th>
                <th style="color: #fff;">País de Formação</th>
                <th style="color: #fff;">Instituição de Ensino</th>
            </tr>
            @forelse ($employee->academicQualification as $qualification)
            <tr>
                <td style="text-align: center;">{{$qualification->academic_level}}</td>
                <td style="text-align: center;">{{$qualification->conclusion_year}}</td>
                <td style="text-align: center;">{{$qualification->course}}</td>
                <td style="text-align: center;">{{$qualification->country->description}}</td>
                <td style="text-align: center;">{{$qualification->educational_institution}}</td>
            </tr>
            @empty
            <tr>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr>
            @endforelse
        </table>

        <table>
            <tr>
                <th colspan="4" style="text-align: center; font-weight: bold;">EXPERIENCIAS PROFISSIONAIS</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Empregador</th>
                <th style="color: #fff;">Função Exercida</th>
                <th style="color: #fff;">Período (De)</th>
                <th style="color: #fff;">Período (A)</th>
            </tr>
            @forelse ($employee->professionalExperience as $experience)
            <tr>
                <td style="text-align: center;">{{$experience->employer}}</td>
                <td style="text-align: center;">{{$experience->function_performed}}</td>
                <td style="text-align: center;">{{$experience->begin}}</td>
                <td style="text-align: center;">{{$experience->finish ? $experience->finish : "---"}}</td>
            </tr> 
            @empty
            <tr>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr>
            @endforelse
        </table>


        <table>
            <tr>
                <th colspan="4" style="text-align: center; font-weight: bold;">CONCTATOS</th>
            </tr>
        </table>
        <div style="width: 100%">
            <div style="width: 40%; float:left;">
                <table>
                    <tr>
                        <th colspan="2" style="text-align: center; font-weight: bold;">CONCTATOS PESSOAIS</th>
                    </tr>
                    <tr style="background-color: green;">
                        <th style="color: #fff;">Tipo</th>
                        <th style="color: #fff;">Contacto</th>
                    </tr>
                    @forelse ($employee->personalContact as $person)
                    <tr>
                        <td style="text-align: center;">{{$person->typeContact->label}}</td>
                        <td style="text-align: center;">{{$person->contact}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td style="text-align: center;">---</td>
                        <td style="text-align: center;">---</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            <div style="width: 60%; float:right;">
                <table style="width: 95%;">
                    <tr>
                        <th colspan="3" style="text-align: center; font-weight: bold;">CONTACTOS ALTERNATIVOS</th>
                    </tr>
                    <tr style="background-color: green;">
                        <th style="color: #fff;">Nome</th>
                        <th style="color: #fff;">Relação de Parentesco</th>
                        <th style="color: #fff;">Telefone</th>
                    </tr>
                    @forelse ($employee->alternativeContact as $alternative)
                    <tr>
                        <td style="text-align: center;">{{$alternative->full_name}}</td>
                        <td style="text-align: center;">{{$alternative->degreeOfKinship->label}}</td>
                        <td style="text-align: center;">{{$alternative->phone}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td style="text-align: center;">---</td>
                        <td style="text-align: center;">---</td>
                        <td style="text-align: center;">---</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>

        <br><br><br><br><br><br><br>
        <table>
            <tr>
                <th colspan="6" style="text-align: center; font-weight: bold;">DESENVOLVIMENTO PROFISSIONAL</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Processo</th>
                <th style="color: #fff;">Departamento</th>
                <th style="color: #fff;">Função</th>
                <th style="color: #fff;">Despacho</th>
                <th style="color: #fff;">Data Despacho</th>
                <th style="color: #fff;">Data Visto</th>
            </tr>
            @forelse ($employee->professionalDevelopment as $development)
            <tr>
                <td style="text-align: center;">{{$development->process_code}}</td>
                <td style="text-align: center;">{{$development->department->label}}</td>
                <td style="text-align: center;">{{$development->positionCompany->label}}</td>
                <td style="text-align: center;">{{$development->dispatch_process}}</td>
                <td style="text-align: center;">{{$development->dispatch_date}}</td>
                <td style="text-align: center;">{{$development->visa_date}}</td>
            </tr>
            @empty
            <tr>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
                <td style="text-align: center;">---</td>
            </tr>
            @endforelse
        </table>

        <table>
            <tr>
                <th colspan="3" style="text-align: center; font-weight: bold;">AVALIAÇÃO DE DESEMPENHO</th>
            </tr>
            <tr style="background-color: green;">
                <th style="color: #fff;">Avaliação</th>
                <th style="color: #fff;">Ano</th>
                <th style="color: #fff;">Nota</th>
            </tr>
            @forelse ($employee->performanceEvaluation as $key => $performance)
            <tr>
                <td style="text-align: center;">{{$key+1}}<sup>a</sup></td>
                <td style="text-align: center;">{{$performance->year}}</td>
                <td style="text-align: center;">{{$performance->note}}</td>
            </tr>
            @empty
            <td style="text-align: center;">---</td>
            <td style="text-align: center;">---</td>
            <td style="text-align: center;">---</td>
            @endforelse
        </table>

        <div style="text-align: center; margin-top: 25px;">
            <p>Nampula, _____de________________de {{date("Y")}}</p>
            <p>Assinatura do FAE ____________________________</p>
            <br>
            <h1>O CHEFE DA REPARTICAO DE RECURSOS HUMANOS</h1>
            <p>__________________________________</p>
            <p>Emerson Castro Mirranda</p>
            <p>(ITPN1)</p>
        </div>
    </div>
</body>
</html>
