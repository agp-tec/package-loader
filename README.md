<p align="center"><img src="https://deploy.agapesolucoes.com.br/media/logos/AGP/logo-blue.svg" width="400"></p>

# Modelo Laravel

### Introdução

Projeto modelo para aplicações web que utilizel framework Laravel.

### Git do projeto
[Modelo Laravel](https://git.agapesolucoes.com.br/AGP/modelo-laravel)

### Fórum de discução
[Fórum AGP](https://www.agapesolucoes.com.br/forum)

### Instalação

Este projeto possui um crud modelo (Tag) e o template do metronic Demo1 com todos os recursos.
Para otimizar o tamanho do projeto final é necessário remover arquivos de template que não serão usados após escolher o tema final.

Para este projeto será preciso de [Composer](https://getcomposer.org/) e [Node](https://nodejs.org/) instalado no seu computador.

Assumindo que todos os requisitos estão cumpridos, siga os passos a seguir para instalar o projeto:

1. Abre o CMD ou terminal do projeto.
2. Execute os seguintes comandos:

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
npm install
```

```bash
npm run dev
```

```bash
php artisan serve
```

And navigate to generated server link (http://127.0.0.1:8000)

### Compartilhamento de sessão e cookie

O projeto compartilha sessão e cookie com os outros projetos. Para que o compartilhamento funcione é importante 
configurar corretamente a seguinte variavel em .env:
##### SESSION_DOMAIN=127.0.0.1
Caso use virtual host, o valor da variável precisa ser o endereço da url local.

### Deployment

Execute o comando `` git-pull-install.sh <repo dir> `` para realizar a instalação do projeto em ambiente de deploy.

### Copyright

AGP @ 2020

