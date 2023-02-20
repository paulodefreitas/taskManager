# taskManager
Gerenciador de Tarefas

Um gerenciador de tarefas é uma ferramenta que serve para listar as atividades que devem ser executadas individualmente ou por um grupo de pessoas, possibilitando também a mensuração do tempo e a comunicação fluída entre as pessoas do time.

## Sobre o sistema

Este sistema utiliza o XAMPP como plataforma de desenvolvimento web e é feito em PHP com arquitetura MVC, Bootstrap 5 e MySQL. Possui um cadastro de usuário e login, permitindo que cada usuário gerencie suas próprias tarefas. O sistema utiliza um CRUD para o gerenciamento de tarefas, permitindo que os usuários criem, visualizem, editem e excluam suas tarefas. O uso de tecnologias como PHP, Bootstrap 5 e MySQL permitem que o sistema seja desenvolvido de forma eficiente e escalável, garantindo um alto desempenho e segurança. Com esse sistema, os usuários podem gerenciar suas tarefas de forma organizada e eficiente, tornando o processo mais fácil e ágil.

##
SQL

CREATE DATABASE taskManager;
USE taskManager;
CREATE TABLE usuarios (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tarefas (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT(11) NOT NULL,
  tarefa VARCHAR(256) NOT NULL,
  prioridade VARCHAR(20) NOT NULL,
  estado VARCHAR(20) NOT NULL,
  texto TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

## Diretório

C:\xampp\htdocs\taskManager

## WebBrowser

http://localhost/taskManager/


