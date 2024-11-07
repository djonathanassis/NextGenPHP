# Desafio Aula01

## Configurando um projeto 
Faça a configuração do projeto na pasta ```./projeto```

Para rodar o projeto
```sh
docker compose up -d
```

Para executar algum comando no contêiner
```sh
docker compose exec php [seu comando aqui]
```

Coloque as informações em um arquivo ```detalhes.txt```

1. Identifique a versão do PHP e Zend Engine
2. Liste as extensões instaladas
3. Identifique a localização do arquivo ```php.ini``` no contêiner
4. Substituia o arquivo interno do ```php.ini``` pelo novo usando volume
5. Ajuste o horário padrão do PHP para ```America/Sao_Paulo```
6. Aumente o limite de memória do PHP para 512mbs
8. Corrija o erro de exibição do projeto

## Desafio pessoal(não entregável)
1. Descobrir qual a versão da extensão ```pdo_sqlite```

2. Compilar o PHP usando o que foi mostrado em aula.

Duas sugestões:

* Criar uma imagem docker ubuntu e compilar como mostrado em aula
* Criar uma VM(virtualbox) e compilar o PHP no sistema

obs: Os passos estão em [README](README.md)

## Bons estudos!