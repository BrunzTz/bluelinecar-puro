<?php

    class LoginUser{
    
        public function Login()
        {  
            $db = new Connect;
            $users = array();
            $data = $db->prepare('SELECT * FROM cliente');
            $data->execute();

            while($OutputData = $data->fetch(PDO::FETCH_ASSOC))
            {
                $users[$OutputData['nome']] = array(
                    'nome' => $OutputData['nome'],
                    'email' => $OutputData['email']
                );
            }

            return json_encode($users);
        }
    }
    
?>