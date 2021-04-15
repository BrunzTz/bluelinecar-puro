<?php

    class LoginSeller{

        public function LoginSeller($requisicao)
        {
            $codigo = $requisicao['codigo'];
            $senha = $requisicao['senha'];
            
            $db = new Connect;
            $sellers = array();
            $data = $db->prepare('SELECT * FROM vendedor WHERE codigo = :codigo AND senha = :senha LIMIT 1');
            $data->execute(array(
                ':codigo' => $codigo,
                ':senha' => $senha
            ));

            while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
                $sellers[$OutputData['nome']] = array(
                    'nome' => $OutputData['nome'],
                    'codigo' => $OutputData['codigo']
                );
            }

            return json_encode($sellers);
        }
    }

?>