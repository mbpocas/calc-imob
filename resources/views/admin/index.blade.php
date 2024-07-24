@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div>
                    <div class="form-group">
                        <ul class="h3 custom-list">
                            <li><a href="{{ route('dash') }}" style="color: white;"><b>Dashboard</b></a></li>
                            <li><a href="{{ route('consulta.index') }}" style="color: white;"><b>Consulta</b></a></li>
                            <li><a href="{{ route('simulacao.index') }}" target="_blank" style="color: white;"><b>Simular</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
