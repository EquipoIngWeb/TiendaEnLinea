@extends('layouts.app')
@section('encabezado')
    <h2>Alta de Categoria</h2>
@stop
@section('contenido')
    <div class="container" style="background-color:#81DAF5 ; border-radius: 20px; color:black">
    <form action="{{url('/guardarCategoria')}}" method="POST">
    <input type = "hidden" name="_token" value="{{csrf_token() }}">
        <div class="row">
            <div class="col-xs-12">
            <br>
            <label for="nombre">Nombre</label>
            <input name= "nombre" type="text" class="form-control" placeholder= "Nombre">
        </div>
        </div>
        <hr>
        <div class="form-group">
            <input type="submit" value="Alta" class="btn btn-info">
            <a href="{{url('/altasCategoria')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@stop