<?php 

    class Chat extends User{

        function chatmake($user){
            
            $f_user = $this->connect()->escape_string($user);

            if(!empty($f_user) && is_numeric($f_user)){

                $record_check_query ="SELECT * FROM chat_list WHERE (user_one={$f_user} AND user_two={$this->user_id}) OR (user_one={$this->user_id} AND user_two={$f_user}) LIMIT 1";
                $record_check_result = $this->connect()->query($record_check_query);

                if($record_check_result->num_rows==1){

                }else{
                    $add_new_chat_query = "INSERT INTO chat_list (user_one,user_two) VALUES ({$f_user},{$this->user_id})";
                    $add_new_chat_result = $this->connect()->query($add_new_chat_query);
                }

            }

        }

        function chatlist(){
            
            $chat_list_load_query = "SELECT DISTINCT u.user_id, u.*,c.* FROM chat_list c INNER JOIN users u ON c.user_one=u.user_id OR c.user_two=u.user_id WHERE c.user_one={$this->user_id} OR c.user_two={$this->user_id} ORDER BY c.cl_id DESC";

            $chat_list_load_result = $this->connect()->query($chat_list_load_query);

            if($chat_list_load_result->num_rows >0){
                $show_chat_list='';
                
                while($chat_list_load_data = $chat_list_load_result->fetch_assoc()){
                    
                    if($chat_list_load_data['user_id']!==$this->user_id){

                        $show_chat_list.='
                        <li class="user">
                            <a href="chat.php?chat='.$chat_list_load_data['cl_id'].'&user='.$chat_list_load_data['user_name'].'">
                                <div class="details">
                                    <img src="IMAGES/profiles/user1.png">
                                    <span>'.$chat_list_load_data['user_name'].'</span>
                                </div>
                            </a>
                        </li>
                        ';

                    }

                }

                return $show_chat_list;
            }
        }

        function chatlistlates(){
            
            $chat_list_load_query = "SELECT DISTINCT u.user_id, u.*,c.* FROM chat_list c INNER JOIN users u ON c.user_one=u.user_id OR c.user_two=u.user_id WHERE c.user_one={$this->user_id} OR c.user_two={$this->user_id} ORDER BY c.cl_id DESC";

            $chat_list_load_result = $this->connect()->query($chat_list_load_query);

            if($chat_list_load_result->num_rows >0){
                $show_chat_list='';
                $run=1;
                while($chat_list_load_data = $chat_list_load_result->fetch_assoc()){
                    
                    if($chat_list_load_data['user_id']!==$this->user_id){
                        if($run==1){
                            $show_chat_list.='
                            <li class="user" style="border:1px solid red;">
                                <a href="chat.php?chat='.$chat_list_load_data['cl_id'].'&user='.$chat_list_load_data['user_name'].'">
                                    <div class="details">
                                        <img src="IMAGES/profiles/user1.png">
                                        <span>'.$chat_list_load_data['user_name'].'</span>
                                    </div>
                                </a>
                            </li>
                            ';

                        }else{
                            
                            $show_chat_list.='
                            <li class="user">
                                <a href="chat.php?chat='.$chat_list_load_data['cl_id'].'&user='.$chat_list_load_data['user_name'].'">
                                    <div class="details">
                                        <img src="IMAGES/profiles/user1.png">
                                        <span>'.$chat_list_load_data['user_name'].'</span>
                                    </div>
                                </a>
                            </li>
                            ';
                        }

                        $run++;
                    }


                }

                return $show_chat_list;
            }
        }

        function messagesend($message){
            
            $new_image_name='';
            $date=date("F_j_Y_g_i_s");
            $upload_root = '../IMAGES/chat_attachment/';

            if(isset($_FILES['chat_attach'])){
                
                $image_file_name = $_FILES['chat_attach']['name'];
                $image_file_type = $_FILES['chat_attach']['type'];
                $image_file_size = $_FILES['chat_attach']['size'];
                $image_temp_name = $_FILES['chat_attach']['tmp_name'];
                
                if(!empty($image_file_name)){
                    $tmp_img = explode('.', $image_file_name);
                    $extension_img = end($tmp_img);
                    $new_image_name="_".$date.".".$extension_img;
                    //file move
                    $file_uploaded = move_uploaded_file($image_temp_name, $upload_root.$new_image_name);
                }
            }

            $chat_message = $this->connect()->escape_string($message['chat_message']);
            $chat_list  = $this->connect()->escape_string($message['chat_list']);

            $add_message_query = "INSERT INTO messages (user_id,cl_id,message,attach) VALUES ({$this->user_id},{$chat_list},'{$chat_message}','{$new_image_name}')";

            $add_message_result = $this->connect()->query($add_message_query);
            
            

        }

        function messageload($chat_list){
            $f_chat_list = $this->connect()->escape_string($chat_list);

            $get_messages_query = "SELECT * FROM messages WHERE cl_id={$chat_list} ORDER BY msg_id ASC";
            $get_messages_result = $this->connect()->query($get_messages_query);

            if($get_messages_result->num_rows >0){
                $show_message_list = '';

                while($get_messages_data = $get_messages_result->fetch_assoc()){
                    
                    if($get_messages_data['user_id']==$this->user_id){

                        $show_message_list.='
                        <div class="message owner">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <p>'.$get_messages_data['message'].'</p>
                        </div>
                        ';

                        if(!empty($get_messages_data['attach'])){
                            $show_message_list.='
                             <div class="message owner">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <a href="IMAGES/chat_attachment/'.$get_messages_data['attach'].'" target="_blank">Attachment -> click here</a>
                        </div>
                       
                        ';
                        }

                    }else{

                        $show_message_list.='

                     

                        <div class="message customer">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <p>'.$get_messages_data['message'].'</p>
                        </div>
                        ';

                        if(!empty($get_messages_data['attach'])){
                            $show_message_list.='
                             <div class="message customer">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <a href="IMAGES/chat_attachment/'.$get_messages_data['attach'].'" target="_blank">Attachment -> click here</a>
                        </div>
                       
                        ';
                        }

                    }
                    
                }

                return $show_message_list;
            }
        }

        function messageloadcommunity($chat_list){
            $f_chat_list = $this->connect()->escape_string($chat_list);

            $get_messages_query = "SELECT * FROM messages m INNER JOIN users u ON m.user_id=u.user_id WHERE cl_id=00 ORDER BY msg_id ASC";
            $get_messages_result = $this->connect()->query($get_messages_query);

            if($get_messages_result->num_rows >0){
                $show_message_list = '';

                while($get_messages_data = $get_messages_result->fetch_assoc()){
                    
                    if($get_messages_data['user_id']==$this->user_id){

                        $show_message_list.='
                        <div class="message owner">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <p><b>'.$get_messages_data['user_name'].'</b> <br> '.$get_messages_data['message'].'</p>
                        </div>
                        ';

                        if(!empty($get_messages_data['attach'])){
                            $show_message_list.='
                             <div class="message owner">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <a href="IMAGES/chat_attachment/'.$get_messages_data['attach'].'" target="_blank">Attachment -> click here</a>
                        </div>
                       
                        ';
                        }

                    }else{

                        $show_message_list.='

                     

                        <div class="message customer">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <p><b>'.$get_messages_data['user_name'].'</b> <br>'.$get_messages_data['message'].'</p>
                        </div>
                        ';

                        if(!empty($get_messages_data['attach'])){
                            $show_message_list.='
                             <div class="message customer">
                            <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                            <p><b>'.$get_messages_data['user_name'].'</b></p>
                            <a href="IMAGES/chat_attachment/'.$get_messages_data['attach'].'" target="_blank">Attachment -> click here</a>
                        </div>
                       
                        ';
                        }

                    }
                    
                }

                return $show_message_list;
            }
        }


    }

?>