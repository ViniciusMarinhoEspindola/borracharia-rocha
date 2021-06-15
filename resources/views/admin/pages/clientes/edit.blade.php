@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-users"></i> Clientes</h2>
</div>

<div class="card my-4 p-4">
    <h5 class="text-muted title"><i class="fas fa-user-edit"></i> Editar Cliente</h5>
</div>

<div class="card my-4 p-4">
    <form method="POST" action="{{ route('admin.clientes.update', $cliente) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col my-3">
                <label for="name">Nome <span class="text-danger">*</span></label>
                <input id="name" class="form-control @error('name') border-danger @enderror" type="text" value="{{ old('name', $cliente->name) }}" name="name" required>
                @error('name')
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="email">E-mail <span class="text-danger">*</span></label>
                <input id="email" class="form-control @error('email') border-danger @enderror" type="email" value="{{ old('email', $cliente->email) }}" name="email" required>
                @error('email')
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="phone">Telefone <span class="text-danger">*</span></label>
                <input id="phone" class="form-control @error('phone') border-danger @enderror" type="phone" value="{{ old('phone', $cliente->phone) }}" name="phone" required>
                @error('phone')
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="password">Senha <span class="text-danger">*</span></label>
                <input id="password" class="form-control @error('password') border-danger @enderror" type="password" name="password">
                @error('password')
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                @enderror
            </div>
        </div>


        <h3>Veículo</h3>

        <div class="row mb-3">
            <div class="form-group col-md-4 col-sm-12 my-3">
                <label for="type">Tipo </label>
                <select id="type" class="form-select @error('type') border-danger @enderror" name="type" value="{{ old('type') }}">
                    <option value="">Selecione ...</option>
                    <option {{ old('type', $cliente->type) == 'Carro' ? 'selected' : '' }} value="Carro">Carro</option>
                    <option {{ old('type', $cliente->type) == 'Moto' ? 'selected' : '' }} value="Moto">Moto</option>
                </select>
                @error('type')
                    <small class="text-danger">{{ $errors->first('type') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4 col-sm-12 my-3">
                <label for="brand">Marca </label>
                <input id="brand" value="{{ old('brand', $cliente->brand) }}" class="form-control @error('brand') border-danger @enderror" type="text" name="brand">
                @error('brand')
                    <small class="text-danger">{{ $errors->first('brand') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4 col-sm-12 my-3">
                <label for="model">Modelo </label>
                <input id="model" value="{{ old('model', $cliente->model) }}" class="form-control @error('model') border-danger @enderror" type="text" name="model">
                @error('model')
                    <small class="text-danger">{{ $errors->first('model') }}</small>
                @enderror
            </div>
        </div>

        <button class="btn btn-danger" type="submit">Editar Usuário</button>
    </form>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.2.0/vanilla-masker.min.js" integrity="sha512-RbMQw6xKGymv6bRMO4z5OxHBzzem7BPEQX7nTJC9G08A70gXdUka76Rvgey83MsSXrIEJddog0vxUKN6iTce2Q==" crossorigin="anonymous"></script>
    <script>
        function inputHandler(masks, max, event) {
            var c = event.target;
            var v = c.value.replace(/\D/g, '');
            var m = c.value.length > max ? 1 : 0;
            VMasker(c).unMask();
            VMasker(c).maskPattern(masks[m]);
            c.value = VMasker.toPattern(v, masks[m]);
        }

        var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
        var tel = document.querySelector('#phone');
        VMasker(tel).maskPattern(telMask[0]);
        tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
    </script>
@endsection
