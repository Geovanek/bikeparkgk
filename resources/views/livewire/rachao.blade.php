<div>
    <div class="middle-box text-center loginscreen animated fadeInDown {{ $action ? 'd-none' : '' }}">
        <h2 style="color: #f5deb1"><small>Inscrição 3° Rachão Bike Park GK</small></h2>
        <h3 class="text-muted">R$40,00</h3>
        <form wire:submit.prevent="subscribe" wire:ignore.self class="m-t" role="form">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                @error('name')
                    <label class="error float-left">{{ $message }}</label>
                @enderror
                <input wire:model.lazy="name" type="text" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                @error('email')
                    <label class="error float-left">{{ $message }}</label>
                @enderror
                <input wire:model.lazy="email" type="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input wire:model.lazy="phone" type="phone" class="form-control" placeholder="Whatsapp">
            </div>
            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                @error('category')
                    <label class="error float-left">{{ $message }}</label>
                @enderror
                <select wire:model.lazy="category" class="form-control m-b" name="category">
                    <option default>Categoria</option>
                    <option value="1">Ranca Toco <small>6 voltas</small></option>
                    <option value="2">Pé de Pano <small>4 voltas</small></option>
                    <option value="3">Galáticas (F) <small>4 voltas</small></option>
                    <option value="4">Aventureiras (F) <small>2 voltas</small></option>
                </select>
            </div>
            <div class="form-group">
                <div class="col-lg-12 {{ $errors->has('exemption_term') ? 'alert alert-danger' : '' }}">
                    <label class="text-muted">
                        <input wire:model.lazy="exemption_term" type="checkbox">
                        Termo de Isenção de Responsabilidade
                    </label>
                    <button type="button" class="btn btn-xs btn-secondary btn-outline" data-toggle="modal" data-target="#myModal">
                        Clique para ler
                    </button>

                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Termo de Isenção de Responsabilidade</h4>
                                </div>
                                <div class="modal-body text-left">
                                    <ol>
                                        <li>Declaro estar em boa forma física, e com condições físicas para participar do 3º Rachão Bike Park GK. Atesto que estou apto a participar deste Evento, sou maior de idade, responsável por meus atos (no caso de menor de idade, reconheço que devo apresentar a assinatura do pai/responsável ao final deste termo).</li>
                                        <li>Declaro que disputo este Evento de livre e espontânea vontade. Que isento de quaisquer responsabilidades os Organizadores, toda equipe e demais envolvidos na realização do evento.</li>
                                        <li>Eu reconheço e assumo livremente todos os riscos, conhecidos ou não e assumo total responsabilidade pela minha participação.</li>
                                        <li>Estou ciente dos riscos que a atividade escolhida oferece entre os quais: quedas, escorregamentos, deslizamentos, escoriações, arranhões, pequenas queimaduras e que, entendo e aceito os riscos mencionados ou quaisquer outros inerentes a prática do mountain bike, que as mesmas ocorrem em áreas naturais, tendo a possibilidade de ocorrer picadas de insetos e animais peçonhentos, queda de árvores, intempéries climáticas, dentre outros. Estou ciente que há riscos de acidentes graves durante esta competição. Declaro assumir por minha livre e espontânea vontade todos os riscos envolvidos e suas consequências.</li>
                                        <li>Tenho ciência de que lesões leves, graves ou gravíssimas podem ocorrer pelo não cumprimento das orientações do evento; Perdas de materiais pessoais, como por exemplo, bicicleta, capacete, máquinas fotográficas, equipamentos de filmagem, óculos de sol ou de grau, bonés, dentre outros, são de minha inteira responsabilidade.</li>
                                        <li>Declaro também ser possuidor de uma declaração médica (atestado médico) liberando a minha pessoa para a competição nos jogos (esporte de nível competitivo). A organização poderá requisitar, a qualquer momento, a apresentação deste Atestado Médico, sob pena de desclassificação, caso o documento não seja apresentado. Em caso algum acidente ocorra em decorrência de algum fator médico pré-existente, que poderia ter sido detectado através deste Atestado Médico isenta de toda e qualquer responsabilidade a organização do evento, bem como seus integrantes e descendentes, direta ou indiretamente.</li>
                                        <li>Declaro estar ciente que caso exista no evento a disponibilização de uma Equipe Médica, esta será apenas para Pronto-Socorrismo, com o objetivo de atender às primeiras necessidades e encaminhar aos hospitais quando preciso. Esta equipe cuidará apenas dos casos mais “brandos”, sendo responsabilidade do participante encaminhar-se aos hospitais e/ou postos médica, quando solicitado. A partir deste primeiro atendimento pela equipe de Pronto-Socorro, o participante deverá arcar com todas as outras despesas médicas.</li>
                                        <li>Declaro estar ciente que a Comissão Organizadora não se responsabilizará, de nenhuma forma, por qualquer atendimento médico, efetuado a algum atleta, por pessoas externas à organização do evento.</li>
                                        <li>Eu, por mim mesmo, meus herdeiros, representantes legais e parentes próximos, isento e desobrigo a Organização, toda a Equipe Médica, seus colaboradores, agentes ou empregados, de qualquer responsabilidade legal, com respeito a qualquer e todo dano, invalidez ou morte, que eu possa vir a sofrer.</li>
                                        <li>Em caso de acidentes, mesmo que causados por falhas ou negligência dos Organizadores, Eu e minha família isentamos a Organização e toda a Equipe Médica, de toda e qualquer responsabilidade legal, por quaisquer danos materiais ou físicos que decorram dos mesmos.</li>
                                        <li>Declaro de livre espontânea vontade ter compreendido e estar ciente de todo o teor do Regimento do Evento, de todo teor deste Termo de Isenção, bem como de meus direitos e obrigações dentro do evento. Isento assim quem quer que seja, de toda e qualquer responsabilidade legal de tudo o que vier a ocorrer comigo por consequência da minha participação no evento.</li>
                                        <li>Aceito o uso de forma gratuita de minha imagem, assim como familiares e amigos, pela Organização responsável a qualquer tempo, consequentemente e universalmente, sua utilização, em qualquer exploração comercial, distribuição e exibição audiovisual e fotografia, por todo e qualquer veiculo, processo, ou meio de comunicação e publicidade, existentes ou que venham a ser criados, podendo as imagens em questão ser utilizada para fins comerciais ou não.</li>
                                    </ol>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn block full-width m-b" style="background: #f5deb1">Inscrever</button>
        </form>
    </div>

    <div class="loginColumns text-center animated fadeInDown {{ $action ? '' : 'd-none' }}">
        <div class="ibox">
            <div class="ibox-title" style="background: #f5deb1; border: none; padding: 15px">
                <h2>Inscrição Realizada</h2>
            </div>
            <div>
                <div class="ibox-content profile-content ">
                    <h3>Confirme sua inscrição enviando um <strong>PIX</strong> para a chave abaixo:</h3>
                    <div class="row justify-content-center m-b-md">
                        <div class="input-group col-7">
                            <input type="text" id="pix" class="form-control" value="f8ca7c90-91ba-43ea-b319-9f2aff181549">
                            <span class="input-group-append">
                                <button type="button" id="copyPIX" class="btn btn-primary"><i class="fa fa-clone"></i></button>
                            </span>
                        </div>
                    </div>
                    <h3><strong>Valor R$40,00</strong></h3>
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>Ou leia o QR-Code abaixo:</strong></h4>
                    <div class="ibox-content no-padding border-none">
                        <img alt="image" class="img-fluid" src="{{ asset('img/Pix.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
