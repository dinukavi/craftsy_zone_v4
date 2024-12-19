<?php
    class SignIn extends DConnect{
        
        function signin($email,$password){

            $f_email = $this->connect()->escape_string($email);
            $f_password = $this->connect()->escape_string($password);

            if(!empty($f_email) && !empty($f_password)){

                $user_check_query = "SELECT * FROM users WHERE email='{$f_email}' AND password='{$password}' LIMIT 1";
                $user_check_result = $this->connect()->query($user_check_query);

                if($user_check_result->num_rows ==1){
                    
                    $user_check_data = $user_check_result->fetch_assoc();

                    $_SESSION['u_id'] = $user_check_data['user_id'];
                    $_SESSION['u_name'] = $user_check_data['user_name'];
                    $_SESSION['u_email'] = $user_check_data['email'];

                    return 'done';
                }else{
                    return 'wrong';
                }

            }else{
                return 'fill';
            }

        }
    }
?>