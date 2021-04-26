@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-boxes"></i> Pneus</h2>
</div>

<div class="card my-4 p-4">
    <h5 class="text-muted title"><i class="fas fa-plus"></i> Adicionar Pneu</h5>
</div>

<div class="card my-4 p-4">
    <form method="POST" action="{{ route('admin.pneus.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="form-group col my-3">
                <label for="imagem">Imagens <span class="text-danger">*</span></label>
                <input id="imagem" class="form-control @error('imagem') border-danger @enderror" type="file" multiple value="{{ old('imagem') }}" name="imagens[]" required>
                @error('imagem')
                    <small class="text-danger">{{ $errors->first('imagem') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="modelo">Modelo <span class="text-danger">*</span></label>
                <input id="modelo" class="form-control @error('modelo') border-danger @enderror" type="text" value="{{ old('modelo') }}" name="modelo" required>
                @error('modelo')
                    <small class="text-danger">{{ $errors->first('modelo') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="largura">Largura <span class="text-danger">*</span></label>
                <input id="largura" class="form-control @error('largura') border-danger @enderror" type="number" step="0.01" min="0"  value="{{ old('largura') }}" name="largura" required>
                @error('largura')
                    <small class="text-danger">{{ $errors->first('largura') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="perfil">Perfil <span class="text-danger">*</span></label>
                <input id="perfil" class="form-control @error('perfil') border-danger @enderror" type="number" step="0.01" min="0" value="{{ old('perfil') }}" name="perfil" required>
                @error('perfil')
                    <small class="text-danger">{{ $errors->first('perfil') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="aro">Aro <span class="text-danger">*</span></label>
                <input id="aro" class="form-control @error('aro') border-danger @enderror" type="number" step="0.01" min="0" value="{{ old('aro') }}" name="aro" required>
                @error('aro')
                    <small class="text-danger">{{ $errors->first('aro') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="valor">Valor <span class="text-danger">*</span></label>
                <input id="valor" class="form-control @error('valor') border-danger @enderror" type="number" step="0.01" min="0" value="{{ old('valor') }}" name="valor" required>
                @error('valor')
                    <small class="text-danger">{{ $errors->first('valor') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="quantidade">Quantidade <span class="text-danger">*</span></label>
                <input id="quantidade" class="form-control @error('quantidade') border-danger @enderror" type="number" min="0" value="{{ old('quantidade') }}" name="quantidade" required>
                @error('quantidade')
                    <small class="text-danger">{{ $errors->first('quantidade') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 my-3">
                <label for="descricao">Descrição </label>
                <textarea id="descricao" class="form-control @error('descricao') border-danger @enderror" name="descricao">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <small class="text-danger">{{ $errors->first('descricao') }}</small>
                @enderror
            </div>
        </div>

        <button class="btn btn-danger" type="submit">Adicionar Pneu</button>
    </form>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
