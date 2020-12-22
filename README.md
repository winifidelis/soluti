## SOLUTI


## Para executar o projeto
Faça o downlaod do projeto e descompacta-lo em sua máquina.
Abra a pasta do projeto e abrir a pasta projeto no terminal
executar o comando
```bash
> composer i
```
abra o projeto e modifique o arquivo .env nas configurações do banco de dados.
você poderá executar a cópia do banco de dados, no arquivo 'bancodedados.sql' que está na raiz do projeto ou apenas criar o banco de dado com o nome que esolher e executar o comando

```bash
> php artisan migrate:refresh --seed
```
execute o comando abaixo para rodar o projeto

```bash
> php artisan serve
```