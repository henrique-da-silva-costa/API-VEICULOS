# Descrição

Esse projeto foi feito com o intuito de estudar programação orientada a objetos com PHP.

Nesse projeto, foi feito um crud simples, com três classes que contem os mesmos métodos, estendendo de uma classe pai. 

# Como iniciar o projeto

Tenha o composer instalado, rode no terminal -> composer update -> php -S localhost:9999 

Para configurar o banco, tem um arquivo chamado banco na pasta (models).

Nesse arquivo tem essa função com a configurção

![image](https://github.com/user-attachments/assets/935c53ed-9c46-4388-a0f5-3ef60972769c)


## Rotas

### Carro
* Cadastrar(POST) -> "/carro/cadastrar"
* Listar(GET) -> "/carro"
* Listar/unico(GET) -> "/carro/unico" parametro id
* Editar(POST) -> "/carro/editar"
* Excluir(DELETE) -> "/carro/excluir"
  
### Moto
* Cadastrar(POST) -> "/moto/cadastrar"
* Listar(GET) -> "/moto"
* Listar/unico(GET) -> "/moto/unico" parametro id
* Editar(POST) -> "/moto/editar"
* Excluir(DELETE) -> "/moto/excluir"

### Caminhao
* Cadastrar(POST) -> "/caminhao/cadastrar"
* Listar(GET) -> "/caminhao"
* Listar/unico(GET) -> "/caminhao/unico" parametro id
* Editar(POST) -> "/caminhao/editar"
* Excluir(DELETE) -> "/caminhao/excluir"
