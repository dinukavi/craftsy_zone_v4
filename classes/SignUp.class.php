<?php 
    class SignUp extends DConnect{

        function registeruser($email,$password,$user_name){

            $f_email = $this->connect()->escape_string($email);
            $f_password = $this->connect()->escape_string($password);
            $f_user_name = $this->connect()->escape_string($user_name);

            if(!empty($f_email) && !empty($f_password) && !empty($f_user_name)){

                $user_check_query = "SELECT * FROM users WHERE user_name='{$f_user_name}' OR email='{$f_email}' LIMIT 1";
                $user_check_result = $this->connect()->query($user_check_query);

                if($user_check_result->num_rows==1){
                    return 'used';
                }else{
                    $user_add_query = "INSERT INTO users (user_name,email,password) VALUES ('{$f_user_name}','{$f_email}','{$f_password}')";
                    $user_add_result = $this->connect()->query($user_add_query);

                    if($user_add_result){

                        $user_check_query = "SELECT * FROM users WHERE email='{$f_email}' AND password='{$f_password}' LIMIT 1";
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
                        return 'oops';
                    }
                }

            }else{
                return 'fill';
            }
        }

    }
?>