@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container-fluid no-padding table-responsive-sm">
        <table class="table table-striped nowrap" style="width:100%" id="users">


            <div class="justify-content-center title text-center">
                <h2>Editar Role</h2>
            </div>
    </div>
    </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> voltar</a>
    </div>
    </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ops!</strong> Problemas no inpu!t<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <form method="POST" action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
        @csrf
        @method('PUT')
        </div>
        </div>
        <label for="name" class="col-sm-2 col-form-label">Nome do role</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}"
                autocomplete="off" autofocus>
        </div>
        </div>
        </div>
        </div>
        <div class="row">
            <table class="table table-hover table table-bordered">
                <thead>
                    <tr>
                <tbody>
                    @foreach ($permissions as $id => $permission)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $id }}"
                                            {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                        <span class="form-check-sign">
                                            <span class="check" value=""></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                {{ $permission }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="justify-content-center title text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>

    </form>

@endsection
