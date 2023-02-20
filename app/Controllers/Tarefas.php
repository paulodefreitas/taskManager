<?php

class Tarefas extends Controller
{
    private $tarefaModel;
    private $usuarioModel;

    public function __construct()
    {
        //checa se o usuário não está logado redirecionando para página de login
        if (!Sessao::estaLogado()):
            URL::redirecionar("usuarios/login");
        endif;

        //chama os modelos responsáveis por fazer a comunicação com o banco de dados
        $this->tarefaModel = $this->model("Tarefa");
        $this->usuarioModel = $this->model("Usuario");
    }

    public function index()
    {
        //define os dados das tarefas
        $dados = [
            "tarefas" => $this->tarefaModel->lerTarefas(),
        ];
        //define a view para exibir as tarefas
        $this->view("tarefas/index", $dados);
    }

    public function cadastrar()
    {
        //recebe os dados do formulario e os filtra
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)):
            $dados = [
                "tarefa" => trim($formulario["tarefa"]),
                "prioridade" => isset($formulario["prioridade"])
                    ? trim($formulario["prioridade"])
                    : "",
                "estado" => isset($formulario["estado"])
                    ? trim($formulario["estado"])
                    : "",
                "texto" => trim($formulario["texto"]),
                "usuario_id" => $_SESSION["usuario_id"],
            ];

            //checa campos em branco
            if (in_array("", $formulario)):
                if (empty($formulario["tarefa"])):
                    $dados["tarefa_erro"] =
                        "Por favor, preencha o nome da tarefa.";
                endif;

                if (empty($formulario["prioridade"])):
                    $dados["prioridade_erro"] =
                        "Por favor, selecione a prioridade da tarefa.";
                endif;

                if (empty($formulario["estado"])):
                    $dados["estado_erro"] =
                        "Por favor, selecione o estado da tarefa.";
                endif;

                if (empty($formulario["texto"])):
                    $dados["texto_erro"] =
                        "Por favor, preencha o campo texto da tarefa.";
                endif;
                //chama o metodo armazenar do modelo Tarefa para cadastrar os dados no banco de dados
            else:
                if ($this->tarefaModel->armazenar($dados)):
                    Sessao::mensagem("tarefa", "Tarefa cadastrada com sucesso");
                    URL::redirecionar("tarefas");
                else:
                    die("Erro ao armazenar tarefa no banco de dados");
                endif;
            endif;
        else:
            $dados = [
                "tarefa" => "",
                "prioridade" => "",
                "estado" => "",
                "texto" => "",
                "tarefa_erro" => "",
                "prioridade_erro" => "",
                "estado_erro" => "",
                "texto_erro" => "",
            ];
        endif;

        $this->view("tarefas/cadastrar", $dados);
    }

    public function editar($id)
    {
        //recebe os dados do formulario e os filtra
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)):
            $dados = [
                "id" => $id,
                "tarefa" => trim($formulario["tarefa"]),
                "prioridade" => isset($formulario["prioridade"])
                    ? trim($formulario["prioridade"])
                    : "",
                "estado" => isset($formulario["estado"])
                    ? trim($formulario["estado"])
                    : "",
                "texto" => trim($formulario["texto"]),
            ];

            //checa campos em branco
            if (in_array("", $formulario)):
                if (empty($formulario["tarefa"])):
                    $dados["tarefa_erro"] =
                        "Por favor, preencha o nome da tarefa.";
                endif;

                if (empty($formulario["prioridade"])):
                    $dados["prioridade_erro"] =
                        "Por favor, selecione a prioridade da tarefa.";
                endif;

                if (empty($formulario["estado"])):
                    $dados["estado_erro"] =
                        "Por favor, selecione o estado da tarefa.";
                endif;

                if (empty($formulario["texto"])):
                    $dados["texto_erro"] =
                        "Por favor, preencha o campo texto da tarefa.";
                endif;
                //chama o metodo atualizar do modelo Tarefa para atualizar os dados no banco de dados
            else:
                if ($this->tarefaModel->atualizar($dados)):
                    Sessao::mensagem("tarefa", "Tarefa atualizada com sucesso");
                    URL::redirecionar("tarefas");
                else:
                    die("Erro ao atualizar tarefa no banco de dados");
                endif;
            endif;
        else:
            $tarefa = $this->tarefaModel->lerTarefaPorId($id);

            if ($tarefa->usuario_id != $_SESSION["usuario_id"]):
                Sessao::mensagem(
                    "tarefa",
                    "Você não tem autorização para editar essa Tarefa",
                    "alert alert-danger"
                );
                URL::redirecionar("tarefas");
            endif;

            $dados = [
                "id" => $tarefa->id,
                "tarefa" => $tarefa->tarefa,
                "prioridade" => $tarefa->prioridade,
                "estado" => $tarefa->estado,
                "texto" => $tarefa->texto,
                "tarefa_erro" => "",
                "prioridade_erro" => "",
                "estado_erro" => "",
                "texto_erro" => "",
            ];
        endif;

        $this->view("tarefas/editar", $dados);
    }

    /* exibe o tarefa com os dados  */
    public function ver($id)
    {
        //chama o metodo para ler tarefas por seu ID no modelo Tarefa
        $tarefa = $this->tarefaModel->lerTarefaPorId($id);
        //chama o metodo para ler o usuario por seu ID no modelo Usuario
        $usuario = $this->usuarioModel->lerUsuarioPorId($tarefa->usuario_id);

        //define os dados da view
        $dados = [
            "tarefa" => $tarefa,
            "usuario" => $usuario,
        ];

        //define a view para ver o tarefa
        $this->view("tarefas/ver", $dados);
    }

    public function deletar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->tarefaModel->destruir($id)) {
                Sessao::mensagem('tarefa', 'Tarefa excluída com sucesso');
                URL::redirecionar('tarefas');
            } else {
                die('Erro ao excluir tarefa do banco de dados');
            }
        } else {
            $tarefa = $this->tarefaModel->lerTarefaPorId($id);

            if ($tarefa->usuario_id != $_SESSION['usuario_id']) {
                Sessao::mensagem(
                    'tarefa',
                    'Você não tem autorização para excluir esta tarefa',
                    'alert alert-danger'
                );
                URL::redirecionar('tarefas');
            }

            $dados = [
                'tarefa' => $tarefa
            ];

            $this->view('tarefas/deletar', $dados);
        }
    }
    



    /* checa se o usuario que escreveu o tarefa é o mesmo que está logado */
    /*
    private function checarAutorizacao($id)
    {
        $tarefa = $this->tarefaModel->lerTarefaPorId($id);
        if ($tarefa->usuario_id != $_SESSION["usuario_id"]):
            return true;
        else:
            return false;
        endif;
    }
    */
}

?>
