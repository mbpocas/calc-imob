@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 p-2 justify-content-center">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="p-3">
                            <h4 class="card-title text-dark d-flex justify-content-between align-items-center">
                                Consulta
                                <span>

                                </span>
                            </h4>

                            <form action="{{ route('consulta.update', $consulta->id) }}" method="POST" id="form-update">
                                @csrf
                                @method('PUT')

                                <div class="row mt-3">
                                    <div class="col-md mb-3">
                                        <label for="renda" class="form-label">Renda</label>
                                        <input type="text" class="form-control" id="renda" name="renda"
                                            value="{{ old('renda', $consulta->renda) }}" required>
                                        @error('renda')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md mb-3">
                                        <label for="juros" class="form-label">Juros</label>
                                        <input type="text" class="form-control" id="juros" name="juros"
                                            value="{{ old('juros', $consulta->juros) }}" required>
                                        @error('juros')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="{{ old('price', $consulta->price) }}" required>
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="parcela" class="form-label">Parcela</label>
                                        <input type="text" class="form-control" id="parcela" name="parcela"
                                            value="{{ old('parcela', $consulta->parcela) }}" required>
                                        @error('parcela')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md mb-3">
                                        <label for="sub_com" class="form-label">Sub Com</label>
                                        <input type="text" class="form-control" id="sub_com" name="sub_com"
                                            value="{{ old('sub_com', $consulta->sub_com) }}" required>
                                        @error('sub_com')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md mb-3">
                                        <label for="sub_sem" class="form-label">Sub Sem</label>
                                        <input type="text" class="form-control" id="sub_sem" name="sub_sem"
                                            value="{{ old('sub_sem', $consulta->sub_sem) }}" required>
                                        @error('sub_sem')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <div class="card-footer bg-white text-end">
                                    <a href=" {{ route('consulta.index') }} " class="btn btn-outline-light cancel-btn">
                                        <i class="fas fa-times text-danger"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-outline-primary" form="form-update">
                                        <i class="fas fa-save"></i> Atualizar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/consulta.js') }}"></script>
