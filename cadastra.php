
<?php


/*
#CRIAR BANCO DE DADOS + TABELA

CREATE DATABASE `nota`;
CREATE TABLE `nota`.`aluno`(
 `id` INT NOT NULL AUTO_INCREMENT,
 `nome` TEXT NOT NULL,
 `cpf` VARCHAR(20) NOT NULL,
 `email` TEXT NOT NULL,
 PRIMARY KEY(`id`)
) ENGINE = INNODB;
 */

/*
#CRIAR COLUNAS
ALTER TABLE `aluno` ADD `av1` FLOAT NOT NULL ;
ALTER TABLE `aluno` ADD `av2` FLOAT NOT NULL ;
ALTER TABLE `aluno` ADD `media` FLOAT NOT NULL ; 

*/

#localhost = endereço logico do MySQL
#root = privilegios de ADM do DB
#terceiro = senha
#quarto = DB que deseja acessar

 $link = mysqli_connect("localhost", "root", "", "nota");

 //checando a conexão
 if(!$link) {
    printf ("Erro ao conectar ao banco de dados: ",
    mysqli_connect_errno());
    }


 //definindo as variaveis para receber os dados do formulario

 $nome = $_POST['nome'];

 $cpf = $_POST['cpf'];

 $email = $_POST['email'];

 $apelido = $_POST['apelido']; 

 $av1 = $_POST['avum'];
 $av1 = (float)$av1;
 $av2 = $_POST['avdois'];
 $av2 = (float)$av2;

 $media = (float)($av1+$av2)/2;

 //criando a query em SQL para inserir os dados
 $query = "INSERT INTO aluno (nome, cpf, email, av1, av2, media, apelido) VALUES ('$nome', '$cpf',
'$email', '$av1', '$av2', '$media', '$apelido')";

 //executando o comando SQL
 mysqli_query($link, $query);

 //exibe mensagem de confirmação
 echo "Os dados do aluno $nome foram inseridos com sucesso !" 
?>