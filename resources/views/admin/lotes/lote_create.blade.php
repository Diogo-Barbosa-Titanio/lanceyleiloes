@extends('layouts.admin')

@section('titulo','Cadastro de Lote')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-12 mt-4">
                @include('alert_danger')
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Lote</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/lotes/store')}}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <fieldset>
                                <legend>
                                    Dados do lote
                                </legend>


                                <div class="form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="leilao">
                                                Leilão
                                            </label>
                                            <select name="leilao" id="leilao"
                                                    class="custom-select form-control @error('leilao') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($leiloes as $leilao)
                                                    <option value="{{$leilao->id}}" {{old('leilao') == $leilao->id ? 'selected' : ''}}>{{$leilao->nome}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="categoria">
                                                Categoria
                                            </label>
                                            <select name="categoria" id="categoria"
                                                    class="custom-select form-control @error('categoria') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}" {{old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="lance_inicial">
                                                Lance inicial
                                            </label>
                                            <input type="text" id="lance_inicial" name="lance_inicial"
                                                   class="form-control dinheiro @error('lance_inicial') is-invalid @enderror" value="{{ old('lance_inicial') }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="lance_minimo">
                                                Lance mínimo
                                            </label>
                                            <input type="text" id="lance_minimo" name="lance_minimo"
                                                   class="form-control dinheiro @error('lance_minimo') is-invalid @enderror" value="{{ old('lance_minimo') }}">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_inicio">
                                                Data de início
                                            </label>
                                            <input type="text"
                                                   class="form-control data @error('data_inicio') is-invalid @enderror"
                                                   value="{{ old('data_inicio') }}" name="data_inicio" id="data_inicio"
                                                   placeholder="00/00/0000">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_fim">
                                                Data de Encerramento
                                            </label>
                                            <input type="text"
                                                   class="form-control data @error('data_fim') is-invalid @enderror"
                                                   value="{{ old('data_fim') }}" name="data_fim" id="data_fim"
                                                   placeholder="00/00/0000">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="hora_inicio">
                                                Hora de início
                                            </label>
                                            <input type="text"
                                                   class="form-control hora @error('hora_inicio') is-invalid @enderror"
                                                   value="{{ old('hora_inicio') }}" name="hora_inicio" id="hora_inicio"
                                                   placeholder="00:00:00">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="hora_fim">
                                                Hora de Encerramento
                                            </label>
                                            <input type="text"
                                                   class="form-control hora @error('hora_fim') is-invalid @enderror"
                                                   value="{{ old('hora_fim') }}" name="hora_fim" id="hora_fim"
                                                   placeholder="00:00:00">
                                        </div>
                                    </div>

                                </div>



                                <div class="form-row">

                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="nome">
                                                Nome
                                            </label>
                                            <input type="text" id="nome" name="nome"
                                                   class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="descricao">
                                                Descrição
                                            </label>
                                            <textarea class="form-control" id="descricao" name="descricao" rows="3">
                                            {{old('descricao')}}
                                        </textarea>
                                        </div>
                                    </div>

                                </div>


                            </fieldset>


                            <fieldset>
                                <legend>Endereço do imóvel</legend>


                                <div class="form-row">

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="cep">Cep*</label>
                                            <input type="text" class="form-control cep @error('cep') is-invalid @enderror"
                                                   value="{{ old('cep') }}" name="cep" id="cep" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="endereco">Endereço</label>
                                            <input type="text" class="form-control" value="{{ old('endereco') }}"
                                                   name="endereco" id="endereco" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="number" class="form-control" value="{{ old('numero') }}"
                                                   name="numero" id="numero" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="complemento">Complemento</label>
                                            <input type="text" class="form-control" value="{{ old('complemento') }}"
                                                   name="complemento" id="complemento" placeholder="">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" value="{{ old('bairro') }}"
                                                   name="bairro" id="bairro" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" value="{{ old('cidade') }}"
                                                   name="cidade" id="cidade" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input type="text" class="form-control" value="{{ old('estado') }}"
                                                   name="estado" id="estado" placeholder="">
                                        </div>
                                    </div>

                                </div>

                            </fieldset>

                            <fieldset>
                                <legend>Características do Imóvel</legend>

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="fase_da_obra">
                                                Fase da Obra
                                            </label>
                                            <select name="fase_da_obra" id="fase_da_obra"
                                                    class="custom-select form-control @error('fase_da_obra') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($fases_das_obras as $fase_da_obra)
                                                    <option value="{{$fase_da_obra->id}}" {{old('fase_da_obra') == $fase_da_obra->id ? 'selected' : ''}}>{{$fase_da_obra->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="desocupado">
                                                Desocupado
                                            </label>
                                            <select name="desocupado" id="descoupado"
                                                    class="custom-select form-control @error('desocupado') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('desocupado') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('desocupado') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="area_privativa">Área privativa</label>
                                            <input type="number" class="form-control" value="{{ old('area_privativa') }}"
                                                   name="area_privativa" id="area_privativa" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="vagas">Vagas</label>
                                            <input type="number" class="form-control" value="{{ old('vagas') }}" name="vagas"
                                                   id="vagas" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="number">Quartos</label>
                                            <input type="number" class="form-control" value="{{ old('quartos') }}"
                                                   name="quartos" id="cidade" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="suites">Suítes</label>
                                            <input type="number" class="form-control" value="{{ old('suites') }}"
                                                   name="suites" id="suites" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="banheiros">Banheiros</label>
                                            <input type="number" class="form-control" value="{{ old('banheiros') }}" name="banheiros"
                                                   id="banheiros" placeholder="">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="academia">Academia</label>
                                            <select name="academia" id="academia"
                                                    class="custom-select form-control @error('academia') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('academia') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('academia') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="bicicletario">Bicicletário</label>
                                            <select name="bicicletario" id="bicicletario"
                                                    class="custom-select form-control @error('bicicletario') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('bicicletario') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('bicicletario') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="brinquedoteca">Brinquedoteca</label>
                                            <select name="brinquedoteca" id="brinquedoteca"
                                                    class="custom-select form-control @error('brinquedoteca') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('brinquedoteca') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('brinquedoteca') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="campo_de_futebol">Campo de futebol</label>
                                            <select name="campo_de_futebol" id="campo_de_futebol"
                                                    class="custom-select form-control @error('brinquedoteca') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('campo_de_futebol') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('campo_de_futebol') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="churrasqueira">Churrasqueira</label>
                                            <select name="churrasqueira" id="churrasqueira"
                                                    class="custom-select form-control @error('churrasqueira') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('churrasqueira') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('churrasqueira') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="cinema">cinema</label>
                                            <select name="cinema" id="cinema"
                                                    class="custom-select form-control @error('cinema') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('cinema') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('cinema') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-row">
                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="pet_care">Pet Care</label>
                                            <select name="pet_care" id="pet_care"
                                                    class="custom-select form-control @error('pet_care') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('pet_care') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('pet_care') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="piscina">Piscina</label>
                                            <select name="piscina" id="piscina"
                                                    class="custom-select form-control @error('piscina') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('piscina') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('piscina') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="piscina_infantil">Piscina infantil</label>
                                            <select name="piscina_infantil" id="piscina_infantil"
                                                    class="custom-select form-control @error('piscina_infantil') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('piscina_infantil') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('piscina_infantil') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="pista_de_skate">Pista de Skate</label>
                                            <select name="pista_de_skate" id="pista_de_skate"
                                                    class="custom-select form-control @error('pista_de_skate') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('pista_de_skate') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('pista_de_skate') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="playground">Playground</label>
                                            <select name="playground" id="playground"
                                                    class="custom-select form-control @error('playground') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('playground') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('playground') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="quadra_de_squash">Quadra de squash</label>
                                            <select name="quadra_de_squash" id="quadra_de_squash"
                                                    class="custom-select form-control @error('quadra_de_squash') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('quadra_de_squash') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('quadra_de_squash') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-row">
                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="quadra_de_tenis">Quadra de tênis</label>
                                            <select name="quadra_de_tenis" id="quadra_de_tenis"
                                                    class="custom-select form-control @error('quadra_de_tenis') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('quadra_de_tenis') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('quadra_de_tenis') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="restaurante">Restaurante</label>
                                            <select name="restaurante" id="restaurante"
                                                    class="custom-select form-control @error('restaurante') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('restaurante') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('restaurante') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="sala_de_massagem">Sala de massagem</label>
                                            <select name="sala_de_massagem" id="sala_de_massagem"
                                                    class="custom-select form-control @error('sala_de_massagem') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('sala_de_massagem') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('sala_de_massagem') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="salao_de_beleza">Salão de festas</label>
                                            <select name="salao_de_beleza" id="salao_de_beleza"
                                                    class="custom-select form-control @error('salao_de_beleza') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('salao_de_beleza') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('salao_de_beleza') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="salao_de_festas_infantil">Salão de festas infantil</label>
                                            <select name="salao_de_festas_infantil" id="salao_de_festas_infantil"
                                                    class="custom-select form-control @error('salao_de_festas_infantil') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('salao_de_festas_infantil') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('salao_de_festas_infantil') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="salao_de_jogos">Salão de jogos</label>
                                            <select name="salao_de_jogos" id="salao_de_jogos"
                                                    class="custom-select form-control @error('salao_de_jogos') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('salao_de_jogos') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('salao_de_jogos') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-row">
                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="sauna">Sauna</label>
                                            <select name="sauna" id="sauna"
                                                    class="custom-select form-control @error('sauna') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('sauna') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('sauna') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="spa">Spa</label>
                                            <select name="spa" id="spa"
                                                    class="custom-select form-control @error('spa') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('spa') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('spa') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="vagas_de_visitantes">Vagas de visitantes</label>
                                            <select name="vagas_de_visitantes" id="vagas_de_visitantes"
                                                    class="custom-select form-control @error('vagas_de_visitantes') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="S" {{old('vagas_de_visitantes') == 'S' ? 'selected' : ''}}>Sim</option>
                                                <option value="N" {{old('vagas_de_visitantes') == 'N' ? 'selected' : ''}}>Não</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </fieldset>

                            <fieldset>
                                <legend>Fotos</legend>

                                @for($a=1;$a<=10;$a++)

                                    <div class="form-row">

                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="foto_{{{$a}}}" class="font-weight-bold">
                                                    Enviar Foto {{$a}}
                                                </label>
                                                <input type="file" id="foto_{{$a}}" name="foto_{{$a}}" class="form-control-file">
                                            </div>
                                        </div>

                                    </div>

                                @endfor

                            </fieldset>


                            <button type="submit" class="btn btn-primary">
                                <span class="text">Enviar</span>
                            </button>

                            <a href="{{url('/admin/lotes')}}" class="btn btn-secondary">
                                <span class="text">Cancelar</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection

@section('scripts')

    <!-- Máscara de formulários -->
    <script src="{{asset('/js/formulario_mascaras.js')}}"></script>

@endsection
