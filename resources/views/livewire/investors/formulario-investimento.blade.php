<form class="row" wire:submit="createInvestment()">
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Codigo do Processo</label>
        <input type="text" class="form form-control" placeholder="processo" wire:model="process_number">
        @error('process_number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Investidor</label>
        <select name="" id="" class="form form-control" wire:model="investor">
            <option value="" selected>escolha...</option>
            @foreach($investors as $investor)
              <option value="{{$investor->id}}">{{$investor->name}}</option>
            @endforeach
        </select>
        @error('investor') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Montante (MT)</label>
        <input type="text" class="form form-control" placeholder="montante" wire:model="amount">
        @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Data de Inicio</label>
        <input type="date" class="form form-control" wire:model="start_date" max="{{date("Y-m-d")}}">
        @error('start_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Data de Termino</label>
        <input type="date" class="form form-control" wire:model="end_date" min="{{date("Y-m-d")}}">
        @error('end_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Taxa de Retorno (%)</label>
        <input type="text" class="form form-control" placeholder="taxa" wire:model="rate">
        @error('rate') <small class="alert-error"> {{ $message }} </small> @enderror
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