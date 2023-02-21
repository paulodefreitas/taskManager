# taskManager
Gerenciador de Tarefas

Um gerenciador de tarefas é uma ferramenta que serve para listar as atividades que devem ser executadas individualmente ou por um grupo de pessoas, possibilitando também a mensuração do tempo e a comunicação fluída entre as pessoas do time.

## Sobre o sistema

Este sistema utiliza o XAMPP como plataforma de desenvolvimento web e é feito em PHP com arquitetura MVC, Bootstrap 5 e MySQL. Possui um cadastro de usuário e login, permitindo que cada usuário gerencie suas próprias tarefas. O sistema utiliza um CRUD para o gerenciamento de tarefas, permitindo que os usuários criem, visualizem, editem e excluam suas tarefas. O uso de tecnologias como PHP, Bootstrap 5 e MySQL permitem que o sistema seja desenvolvido de forma eficiente e escalável, garantindo um alto desempenho e segurança. Com esse sistema, os usuários podem gerenciar suas tarefas de forma organizada e eficiente, tornando o processo mais fácil e ágil.

## SQL

<font face="Courier New" size="2">
<font color = "blue">CREATE</font>&nbsp;<font color = "blue">DATABASE</font>&nbsp;<font color = "maroon">taskmanager</font><font color = "silver">;</font>
<br/>
<br/><font color = "blue">USE</font>&nbsp;<font color = "maroon">taskmanager</font><font color = "silver">;</font>
<br/>
<br/><font color = "blue">CREATE</font>&nbsp;<font color = "blue">TABLE</font>&nbsp;<font color = "maroon">usuarios</font>
<br/>&nbsp;&nbsp;<font color = "maroon">(</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">id</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>INT</i></font><font color = "maroon">(</font><font color = "black">11</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font>&nbsp;<font color = "blue">PRIMARY</font>&nbsp;<font color = "blue">KEY</font>&nbsp;<font color = "maroon">auto_increment</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">nome</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">255</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">email</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">255</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font>&nbsp;<font color = "blue">UNIQUE</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">senha</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">255</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">criado_em</font>&nbsp;<font color = "black"><i>TIMESTAMP</i></font>&nbsp;<font color = "blue">DEFAULT</font>&nbsp;<font color = "blue">CURRENT_TIMESTAMP</font>
<br/>&nbsp;&nbsp;<font color = "maroon">)</font><font color = "silver">;</font>
<br/>
<br/><font color = "blue">CREATE</font>&nbsp;<font color = "blue">TABLE</font>&nbsp;<font color = "maroon">tarefas</font>
<br/>&nbsp;&nbsp;<font color = "maroon">(</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">id</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>INT</i></font><font color = "maroon">(</font><font color = "black">11</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font>&nbsp;<font color = "blue">PRIMARY</font>&nbsp;<font color = "blue">KEY</font>&nbsp;<font color = "maroon">auto_increment</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">usuario_id</font>&nbsp;<font color = "black"><i>INT</i></font><font color = "maroon">(</font><font color = "black">11</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">tarefa</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">256</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">prioridade</font>&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">20</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">estado</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>VARCHAR</i></font><font color = "maroon">(</font><font color = "black">20</font><font color = "maroon">)</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">NULL</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">texto</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "black"><i>TEXT</i></font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">criado_em</font>&nbsp;&nbsp;<font color = "black"><i>TIMESTAMP</i></font>&nbsp;<font color = "blue">DEFAULT</font>&nbsp;<font color = "blue">CURRENT_TIMESTAMP</font><font color = "silver">,</font>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">FOREIGN</font>&nbsp;<font color = "blue">KEY</font>&nbsp;<font color = "maroon">(</font><font color = "maroon">usuario_id</font><font color = "maroon">)</font>&nbsp;<font color = "blue">REFERENCES</font>&nbsp;<font color = "maroon">usuarios</font><font color = "maroon">(</font><font color = "maroon">id</font><font color = "maroon">)</font>&nbsp;<font color = "blue">ON</font>&nbsp;<font color = "blue">DELETE</font>&nbsp;<font color = "blue">CASCADE</font>
<br/>&nbsp;&nbsp;<font color = "maroon">)</font><font color = "silver">;</font>&nbsp;
</font>

## Vídeo de apresentação do protótipo navegável

[![Vídeo de apresentação do protótipo navegável](https://img.youtube.com/vi/U9CRoFoHSpQ/maxresdefault.jpg)](https://www.youtube.com/watch?v=U9CRoFoHSpQ)

## Vídeo de apresentação do projeto

[![Vídeo de apresentação do projeto](https://img.youtube.com/vi/2vnytdLf5to/maxresdefault.jpg)](https://www.youtube.com/watch?v=2vnytdLf5to)

## Diretório

C:\xampp\htdocs\taskManager

## WebBrowser

http://localhost/taskManager/


