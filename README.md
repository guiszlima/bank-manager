# Gerenciador de Alunos e Matrículas

Este é um projeto desenvolvido em **PHP**, utilizando **Docker**, para gerenciar informações de alunos, cursos e matrículas. O sistema permite **criar**, **editar**, **listar** e **excluir** registros de alunos e matrículas, além de associar alunos aos cursos.

## Funcionalidades

- **Cadastro de Alunos**: Permite registrar alunos com nome, e-mail e data de nascimento.
- **Cadastro de Cursos**: Permite registrar cursos com título e descrição.
- **Matrículas**: Associa alunos a cursos, criando registros de matrículas.

## Configuração do Ambiente

### Passo 1: Clonar o Repositório

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/guiszlima/bank-manager.git
cd bank-manager
```
### Passo 2: Subir os Containers Docker

Para iniciar os containers necessários para a aplicação, execute o seguinte comando:
```bash
docker-compose up -d
```
### Passo 3: Rodar as Migrações

Após os containers estarem em execução, use o seguinte comando para executar as migrações e criar as tabelas no banco de dados:

```bash
docker exec -ti bank_manager-app-1 composer migrate
```
### Passo 4: Acessar a aplicação 
http://localhost:8000
