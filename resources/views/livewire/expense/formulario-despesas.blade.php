<form class="row" wire:submit="createExpense()">
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Codigo do Processo</label>
        <input type="text" class="form form-control" placeholder="processo" wire:model="process_code">
        @error('process_code') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Tipo de Despesa</label>
        <select name="" id="" class="form form-control" wire:model="type_expense">
            <option value="" selected>escolha...</option>
            @foreach($type_expenses as $type_expense)
              <option value="{{$type_expense->id}}">{{$type_expense->description}}</option>
            @endforeach
        </select>
        @error('type_expense') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Custo (MT)</label>
        <input type="text" class="form form-control" placeholder="custo" wire:model="amount">
        @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Data de Despesa</label>
        <input type="date" class="form form-control" wire:model="expense_date" max="{{date("Y-m-d")}}">
        @error('expense_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Anexo de Documento</label>
        <input type="file" class="form form-control" placeholder="nome" wire:model="document">
        @error('document') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Descrição</label>
        <textarea name="" id="" rows="3" class="form form-control" wire:model="description"></textarea>
        @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>