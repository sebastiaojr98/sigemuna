@push('form-wizard')
    <style>
        :root {
        --wizard-color-neutral: #ccc;
        --wizard-color-active: #4183D7;
        --wizard-color-complete: #87D37C;
        --wizard-step-size: 30px;
        --wizard-font-size: 12pt;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 15px;
            counter-reset: step;
        }

        .step-indicator::before {
            content: "";
            position: absolute;
            top: calc(var(--wizard-step-size) / 2);
            left: calc(var(--wizard-step-size) / 2);
            right: calc(var(--wizard-step-size) / 2);
            height: 1px;
            background-color: var(--wizard-color-neutral);
            z-index: 0;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1;
            width: var(--wizard-step-size);
        }

        .step-circle {
            width: var(--wizard-step-size);
            height: var(--wizard-step-size);
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid var(--wizard-color-neutral);
            color: var(--wizard-color-neutral);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: var(--wizard-font-size);
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .step-label {
        text-align: center;
        font-size: 14px;
        color: var(--wizard-color-neutral);
        }

        .step.active .step-circle,
        .step.active .step-label {
        border-color: var(--wizard-color-active);
        color: var(--wizard-color-active);
        }

        .step.complete .step-circle,
        .step.complete .step-label {
        border-color: var(--wizard-color-complete);
        color: var(--wizard-color-complete);
        }

        .step-content {
        display: none;
        }

        .step-content.active {
            display: block;
        }

        .navigation-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        }

        button {
            background-color: var(--wizard-color-active);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 12pt;
            cursor: pointer;
        }

        button:disabled {
            background-color: var(--wizard-color-neutral);
            cursor: not-allowed;
        }
    </style>
@endpush


<div class="row" wire:submit="createCustomer()">
    
    <div class="step-indicator">
        <div class="step {{$this->step === 1 ? 'active' : null }} {{$this->step > 1 ? 'complete' : null }} ">
          <div class="step-circle"><i class="fa fa-user"></i></div>
          <div class="step-label">Dados pessoais</div>
        </div>
        <div class="step {{$this->step === 2 ? 'active' : null }}  {{$this->step > 2 ? 'complete' : null }} ">
          <div class="step-circle"><i class="fa fa-folder-open"></i></div>
          <div class="step-label">Documentos</div>
        </div>
        <div class="step  {{$this->step === 3 ? 'active' : null }}  {{$this->step > 3 ? 'complete' : null }} ">
          <div class="step-circle"><i class="fa fa-paper-plane"></i></div>
          <div class="step-label">Endereço</div>
        </div>
    </div>

    <hr>
    
    @if ($step === 1)
        <div class="col-7 form-group">
            <label for=""><span class="span-required">*</span>Nome/Razão Social</label>
            <input type="text" class="form form-control" placeholder="Nome/Razão Social" wire:model="name">
            @error('name') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        
        <div class="col-5 form-group">
            <label for="">NUIT (Opcional)</label>
            <input type="text" class="form form-control" placeholder="NUIT" wire:model="nuit">
            @error('nuit') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-6 form-group">
            <label for=""><span class="span-required">*</span>Telefone</label>
            <input type="text" class="form form-control" placeholder="Telefone" wire:model="phone">
            @error('phone') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-6 form-group">
            <label for="">Telefone secundário (Opcional)</label>
            <input type="text" class="form form-control" placeholder="Telefone secundário" wire:model="secondaryPhone">
            @error('secondaryPhone') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-12 form-group">
            <label for="">E-mail (Opcional)</label>
            <input type="text" class="form form-control" placeholder="E-mail" wire:model="email">
            @error('email') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-12 d-md-flex justify-content-md-end">
            <button class="btn btn-primary px-5 my-3" wire:click="nextStep()">Proximo</button>
        </div>
    @endif

    @if ($step === 2)
        @if (count($documents) >= 1)
            <div class="col-12 form-group">
                <label for="">Arquivos adcionados: {{count($documents)}}</label>
                <ul>
                    @foreach ($documents as $document)
                        <li style="font-size: 10pt;">{{$document['label']}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-7 form-group">
            <label for=""><span class="span-required">*</span>Tipo de Documento</label>
            <select name="" id="" class="form form-control" wire:model="documentType">
                <option value="" selected>escolha...</option>
                @foreach ($documentTypes as $documentT)
                    <option value="{{$documentT->id}}">{{ $documentT->description }}</option>
                @endforeach
            </select>
            @error('documentType') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-5 form-group">
            <label for="">Validade (Opcional)</label>
            <input type="date" class="form form-control" wire:model="expirationDate">
            @error('expirationDate') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-12 form-group">
            <label for=""><span class="span-required">*</span>Ficheiro</label>
            <input type="file" class="form form-control" wire:model="file">
            @error('file') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-12 form-group mb-2">
            <label for="">Nota (Opcional)</label>
            <textarea rows="3" class="form form-control" style="resize: none" wire:model='observation'></textarea>
            @error('observation') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-12 form-group">
            <button class="btn btn-success px-5" wire:click='addDocument()'>Adicionar</button>
        </div>

        <hr class="my-3">

        <div class="col-12 d-md-flex justify-content-md-end">
            <button class="btn btn-secondary px-5 mx-2" wire:click="prevStep()">Anterior</button>
            @if (count($documents) >= 1)
                <button class="btn btn-primary px-5" wire:click="nextStep()">Proximo</button>   
            @endif
        </div>
    @endif

    <!-- ENDERECO DO CLIENTE -->

    @if ($step === 3)
        <div class="col-12 form-group">
            <label for="">Endereço</label>
            <input type="text" class="form form-control" placeholder="Endereço" wire:model="address">
            @error('address') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <hr class="my-3">
        <div class="col-12 d-md-flex justify-content-md-end">
            <button class="btn btn-secondary px-5 mx-2" wire:click="prevStep()">Anterior</button>
            <button class="btn btn-success px-5" wire:click="createSupplier()">Finalizar</button>
        </div>
    @endif


</div>