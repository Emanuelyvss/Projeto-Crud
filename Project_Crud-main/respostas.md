RESPOSTAS: 

1) Em programação orientada a objetos, uma interface é um conjunto de métodos que definem um conjunto de comportamentos que um objeto deve implementar. É uma espécie de contrato que especifica quais métodos uma classe concreta deve implementar para ser considerada compatível com a interface. A classe DaoContato implementa a interface iDaoModeCrud, o que significa que deve fornecer implementações para cada um dos quatro métodos definidos na interface. Essa classe é responsável por fornecer operações de CRUD (Create, Read, Update e Delete) para um objeto Contato.

2) No PHP, um trait é uma unidade de código reutilizável que pode ser incorporada em uma ou várias classes. É uma forma de reutilização de código que permite que você compartilhe comportamentos e funcionalidades comuns entre várias classes sem precisar criar uma hierarquia de herança complicada.
Um trait é definido como uma classe que contém métodos e propriedades que podem ser usados em outras classes. Esses métodos e propriedades podem ser incorporados em uma classe usando a palavra-chave use. Quando uma classe usa um trait, ela herda os métodos e propriedades definidos no trait como se fossem parte da própria classe.

3) No PDO, tanto o método bindValue() quanto o método bindParam() são usados para definir valores que serão utilizados na execução de uma instrução SQL. Ambos os métodos permitem vincular valores a parâmetros de uma consulta preparada, o que ajuda a prevenir ataques de injeção de SQL e torna o código mais seguro e eficiente. A diferença principal entre bindValue() e bindParam() é como o valor é passado e vinculado ao parâmetro. O método bindValue() associa o valor diretamente ao parâmetro, enquanto o método bindParam() associa uma referência a uma variável ao parâmetro.
    O método bindValue() vincula um valor diretamente ao parâmetro da consulta. Isso significa que, se o valor mudar após a execução do bindValue(), ele não terá efeito sobre o valor que foi vinculado à consulta. 
    Por outro lado, o método bindParam() vincula uma referência a uma variável ao parâmetro da consulta. Isso significa que, se o valor da variável mudar após a execução do bindParam(), ele será refletido na consulta.

4) Na versão atual do PHP (a partir da versão 7.2.0), a função __autoload() foi substituída pelo uso de spl_autoload_register(), que é um recurso mais robusto e flexível para o autoload de classes.
A seguir, segue um exemplo de como reescrever o código do autoload de classes utilizando a função spl_autoload_register():

// Função que faz o autoload de classes

function my_autoloader($class) {
    require_once 'classes/' . $class . '.php';
}

// Registra a função de autoload

spl_autoload_register('my_autoloader');




