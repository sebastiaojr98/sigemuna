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
        <div class="step active">
          <div class="step-circle"><i class="fa fa-user"></i></div>
          <div class="step-label">Dados pessoais</div>
        </div>
    </div>

    <hr>
    
    @if ($step === 1)
        <div class="col-8 form-group">
            <label for=""><span class="span-required">*</span>Despesa</label>
            <select name="" id="" class="form form-control" wire:model="category">
                <option value="" selected>escolha...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-4 form-group">
            <label for=""><span class="span-required">*</span>Recorrente</label>
            <select name="" id="" class="form form-control" wire:model="isRecurring" wire:change='setRecurrence'>
                <option value="" selected>escolha...</option>
                @foreach ($recurrencies as $recurrency)
                    <option value="{{$recurrency}}">{{$recurrency}}</option>
                @endforeach
            </select>
            @error('isRecurring') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        @if ($isRecurring == "Sim")
            <div class="col-5 form-group">
                <label for=""><span class="span-required">*</span>Frequência</label>
                <select name="" id="" class="form form-control" wire:model="frequency">
                    <option value="" selected>escolha...</option>
                    @foreach ($frequencies as $frequency)
                        <option value="{{$frequency}}">{{$frequency}}</option>
                    @endforeach
                </select>
                @error('frequency') <small class="alert-error"> {{ $message }} </small> @enderror
            </div>
        @endif

        @if ($isRecurring == "Sim")
            <div class="col-7 form-group">
        @else
            <div class="col-12 form-group">
        @endif
            <label for=""><span class="span-required">*</span>Fornecedor</label>
            <select name="" id="" class="form form-control" wire:model="supplier">
                <option value="" selected>escolha...</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
            @error('supplier') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-6 form-group">
            <label for=""><span class="span-required">*</span>Montante</label>
            <input type="text" class="form form-control" placeholder="Montante" wire:model="amount">
            @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        
        <div class="col-6 form-group">
            <label for=""><span class="span-required">*</span>Data</label>
            <input type="date" class="form form-control" max="{{date("Y-m-d")}}" wire:model="startDate">
            @error('startDate') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-12 form-group mb-2">
            <label for="">Nota (Opcional)</label>
            <textarea rows="3" class="form form-control" style="resize: none" wire:model='description'></textarea>
            @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>

        <div class="col-12 d-md-flex justify-content-md-end">
            <button class="btn btn-primary px-5 my-3" wire:click="createExpense()">Finalizar</button>
        </div>
    @endif


</div>