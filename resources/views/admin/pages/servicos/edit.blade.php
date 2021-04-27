@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-cogs"></i> Serviços</h2>
</div>

<div class="card my-4 p-4">
    <h5 class="text-muted title"><i class="fas fa-plus"></i> Editar Serviço</h5>
</div>

<div class="card my-4 p-4">
    <form method="POST" action="{{ route('admin.servicos.update', $servico) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col my-3">
                <label for="title">Título <span class="text-danger">*</span></label>
                <input id="title" class="form-control @error('title') border-danger @enderror" type="text" value="{{ old('title', $servico->title) }}" name="title" required>
                @error('title')
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="type">Tipo <span class="text-danger">*</span></label>
                <select id="type" class="form-select @error('type') border-danger @enderror" name="type" required>
                    <option value="" selected disabled>Selecione uma opção</option>
                    <option {{ old('type', $servico->type) == "1" ? "selected" : "" }} value="1">Tipo 1</option>
                    <option {{ old('type', $servico->type) == "2" ? "selected" : "" }} value="2">Tipo 2</option>
                    <option {{ old('type', $servico->type) == "3" ? "selected" : "" }} value="3">Tipo 3</option>
                </select>
                @error('type')
                    <small class="text-danger">{{ $errors->first('type') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="estimated_time">Tempo Estimado <span class="text-danger">*</span></label>
                <input id="estimated_time" class="form-control @error('estimated_time') border-danger @enderror" type="text" placeholder="Formato (hh:mm:ss)" value="{{ old('estimated_time', $servico->estimated_time) }}" name="estimated_time" required>
                @error('estimated_time')
                    <small class="text-danger">{{ $errors->first('estimated_time') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="pneu_id">Pneu</label>
                <select id="pneu_id" class="form-select @error('pneu_id') border-danger @enderror" name="pneu_id">
                    <option value="" selected>Nenhum</option>
                    @foreach ($pneus as $pneu)
                        <option {{ old('pneu_id', $servico->pneu_id) == $pneu->id ? "selected" : "" }} value="{{ $pneu->id }}">#{{ $pneu->id }} - {{ $pneu->modelo }}</option>
                    @endforeach
                </select>
                @error('pneu_id')
                    <small class="text-danger">{{ $errors->first('pneu_id') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col- my-3">
                <label for="description">Descrição </label>
                <textarea id="description" class="form-control @error('description') border-danger @enderror" name="description">{!! old('description', $servico->description) !!}</textarea>
                @error('description')
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                @enderror
            </div>
        </div>

        <button class="btn btn-danger" type="submit">Editar Serviço</button>
    </form>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.2.0/vanilla-masker.min.js" integrity="sha512-RbMQw6xKGymv6bRMO4z5OxHBzzem7BPEQX7nTJC9G08A70gXdUka76Rvgey83MsSXrIEJddog0vxUKN6iTce2Q==" crossorigin="anonymous"></script>
    <script>
        VMasker(document.querySelector("#estimated_time")).maskPattern("99:99:99");
    </script>
@endsection
