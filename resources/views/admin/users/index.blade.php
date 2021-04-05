@extends('admin.layouts.master')

@section('content')

<section class="page-content">
    <div class="card my-4 p-4">
        <h2 class="text-danger title text-center"><i class="fas fa-house-user"></i> Usuários</h2>
    </div>

    <div class="card my-4 p-4 px-5">
        <form action="">
            <div class="row form-group my-3">
                <input type="text" placeholder="Pesquisar" class="form-control" name="s" id="s">
            </div>

            <div class="form-group">
                <button class="btn btn-outline-danger col-1">Pesquisar</button>
            </div>
        </form>
    </div>

    <div class="card my-4 p-4">
        <div class="row justify-content-between mb-5">
            <form action="" class="col">
                <select name="" class="form form-select" id="">
                    <option value="">5</option>
                </select>
            </form>

            <div class="d-flex justify-content-end col-11">
                <a class="btn btn-danger" href=""><i class="fas fa-plus"></i> Cadastrar</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="30%">Nome</th>
                        <th width="50%">E-mail</th>
                        <th class="text-center" width="20%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Administrador</td>
                        <td>admin@borrachariarocha.com.br</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
