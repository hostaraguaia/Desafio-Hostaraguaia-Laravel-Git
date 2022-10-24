# Desafio-Hostaraguaia-Laravel-Git
Desafio teste Laravel 9

A idéia deste desafio é nos permitir avaliar melhor as habilidades de candidatos à vagas de programador PHP Laravel, de vários níveis.

## Instruções de entrega do desafio

1. Faça um clone deste repositório.
1. Em seguida, implemente o projeto tal qual descrito abaixo, em seu clone local.
1. Por fim, envie um pull request com seu email na descriçao.

## Descrição do projeto

* Você deve criar um sistema de cadastros em Laravel 9 com blade. Conforme especificado em abaixo de modo que possa utilizar inserção, consulta, leitura e exclusão por meio do SoftDeletes 
* Criar API com JWT, de modo que possa consumir restfull para inserir, consultar, deletar
* Gerar relatório em PDF atráves do sistema web só com dados dos condutores. 
* Layout será a seu critério, caso dejese utiliza temas pode fica a vontade.
(Não utilize structum ou outro tipo de api que não seja JWT).
* Utilizar banco MYSQL , redis a seu critério. 
* Pode utilizar template de design prontos, desde que siga o modelo de estrutura como no exemplo de clean Architecture https://github.com/nazonohito51/clean-architecture-sample
* Não utiliza react ou angular

1.	CADASTRO DE TIPO DE USUÁRIO
- Administrador
- Usuário Padrão
- Frentista
- Motorista

2.	CADASTRO DE USUÁRIOS DO SISTEMA
- Nome
- Nome do Usuário
- Email do Usuário
- Celular 1 (Campo Não Obrigatório)
- Celular 2 (Campo Não Obrigatório)
- Campo Senha e Alterar Senha
- Tipo do Usuário (Chave Estrangeira)

3.	CADASTRO DE CONDUTOR (Motorista)
- Nome do Condutor 
- Nome de Usuário
- CPF: (Campo CPF) - Não obrigatório
- Matricula (Campo Texto) - Não obrigatório
- CNH (Campo Numérico) - Não obrigatório
- Nascimento - Não obrigatório
- Tipo Contratação (Campo Texto) - Não obrigatório
- Telefone (Campo Numérico) - Não obrigatório
- Celular 1 - (Campo Numérico  Não obrigatório
- Celular 2 - (Campo Numérico  Não obrigatório
- Ativo (Select  Sim ou Não) Ativa e Desativa Ordem de Abastecimento
- Campo Senha e Alterar Senha

4.	CADASTRO DE POSTO DE COMBUSTIVEL

- Consulta do posto de combustivel deverá ser preenchida o cnpj e deverá popular os campos abaixo utilizando  API FREE do Receitaws que devolverá um json de resposta https://receitaws.com.br/v1/cnpj/#NUMERO_CNPJ , consulta deverá se feita no intervalo entre consulta e outra entre 3 minutos. 

- Nome de Fantasia  (Campo Obrigatório)
- Razão Social  (Campo Texto)
- CNPJ:  (Campo Obrigatório)

- Endereço:  (Campo Não Obrigatório)
- CEP (Campo Não Obrigatório)
- Complemento (Campo Não Obrigatório)
- Bairro (Campo Não Obrigatório)
- Cidade – (Campo Não Obrigatório)
- Responsável - (Campo Não Obrigatório)
- Meios de Acesso de Login do Posto pelo CNPJ

- Telefone (Campo Não Obrigatório)

- Email - (Campo Não Obrigatório)
- Campo Senha e Alterar Senha

5.	CADASTRO FRENTISTA
- Nome de Usuário
- Nome do Frentista 
- Nome de Usuário
- Posto de Combustível  (Select) Chave Estrangeira
- Email - (Campo Não Obrigatório)
- Telefone - (Campo Não Obrigatório)
- Senha de Acesso

6.	CADASTRO DE TIPO DE COMBUSTÍVEL
- Tipo Combustível:  Diesel, Etanol, Flex, GNV, Outros  ( Campo Texto)
- Preço do Combustível  (Campo Valor) 
- Observações (Campo Texto Não Obrigatório)

7.	CADASTRO DE VEÍCULOS
- Tipo Veiculo: Ônibus, Carro, Moto  (Select)
- Propriedade: Própria, Tercerizado  (Select)
- Placa (Campo Texto)
- Marca (Campo Texto) Campo Não Obrigatório
- Modelo (Campo Texto) Campo Não Obrigatório
- Ano de Fabricação (Campo Numérico)
- Chassi  - (Campo Numérico) Campo Não Obrigatório
- Renavam (Campo Numérico) Campo Não Obrigatório
- Cor (Campo Texto) Campo Não Obrigatório
- Consumo Médio  (Campo Numérico) Campo Não Obrigatório
- Data Próximo Licenciamento (Campo Data) Campo Não Obrigatório
- Valor Limite por mês (Campo Valor) Campo Não Obrigatório
- Observação  do Veículos - Campo Não Obrigatório
- Tanque Capacidade (Campo Numérico Máximo 3 Dígitos) Campo Não Obrigatório
- Limite de Troca de Óleo (Campo Numérico Máximo 5 Dígitos) Campo Não Obrigatório
- Condutor (Select) 
- SEGURADORA: Nome Seguradora,  Nº Apolice, Vencimento, Valor - Não Obrigatório

Você ganha mais pontos se:

- possuir boa cobertura de testes unitários no projeto.

Será um grande diferencial:

- Se Utilizar o conceitos de arquitetura como (DDD, Clean Architecture) com Laravel
- Injeção de dependência.
- JWT API
- Docker
- ter conhecimento em desenvolvimento web
- Layout 


## Avaliação

Seu projeto será avaliado de acordo com os seguintes critérios.

1. Sua aplicação preenche os requerimentos básicos?
2. Estrutura de código utilizando Clean Architecture
3. Injeção de depedência em laravel
4. Layout 
