<?php 

    class Video extends DConnect{

        function filetload($filters,$ages){
            $filterValues = "'" . implode("','", $filters) . "'";
            
            $ageValues = "'" . implode("','", $ages) . "'";
           
            $ageConditions = [];
            foreach ($ages as $age) {
                $ageConditions[] = "age_filter LIKE '%$age%'";
            }
            $ageFilterQuery = implode(' OR ', $ageConditions);
            
            $catConditions = [];
            foreach ($filters as $cat) {
                $catConditions[] = "video_filter LIKE '%$cat%'";
            }
            $catFilterQuery = implode(' OR ', $catConditions);

            // $filter_query = "SELECT * FROM videos WHERE video_filter IN ($filterValues) AND age_filter IN ($ageValues)";
            
            $filter_query = "SELECT * FROM videos WHERE ($catFilterQuery) AND ($ageFilterQuery)";

            $filter_result = $this->connect()->query($filter_query);

            if($filter_result->num_rows >0){
                
                $filter_video_data = '';

                while($filter_data = $filter_result->fetch_assoc()){
                    $filter_video_data .= '
                        <div class="product">
                            '.$filter_data['video_data'].'
                            <div class="product-name">'.$filter_data['video_title'].'</div>
                            <a href="selected_item.php?vid='.$filter_data['video_id'].'">Go To</a>
                        </div>
                    ';
                }

                return $filter_video_data;
            }

        }


        function singalevideoload($video_id){

            $vide_data_query = "SELECT * FROM videos WHERE video_id={$video_id} LIMIT 1";
            $vide_data_result = $this->connect()->query($vide_data_query);

            $vide_data_load = $vide_data_result->fetch_assoc();
            $video_item_query = "SELECT * FROM video_items WHERE video_id={$video_id}";
            // $video_item_query = "SELECT * FROM video_items v INNER JOIN products p ON v.prd_id=p.prd_id WHERE v.video_id={$video_id}";
            $video_item_result = $this->connect()->query($video_item_query);

            $item_data = '';

            if($video_item_result->num_rows >0){

                while($video_item_data = $video_item_result->fetch_assoc()){

                    $item_data.='
                        <div class="form-group">
                            <label for="glue">'.$video_item_data['item_name'].'</label>
                            <a href="products.php?prd='.$video_item_data['item_name'].'" <button class="btn_upl" type="button">Search</button></a>
                        </div>
                    ';
                  
                }

            }

            
                    // if($video_item_data['item_type']=="product"){
                    //     //product
                    // }else{
                    //     //material
                    //     $item_data.='
                    //         <div class="form-group">
                    //         <label for="glue">'.$video_item_data['item'].'</label>
                    //         <a href="materials.php?prd='.$video_item_data['item'].'" type="button">Search</a>
                    //     </div>
                    //     ';
                    // }


            $show_signle_video = '
                <div class="left-section">
                    <h2>Used materials and tools</h2>
                    '.$item_data.'
                    <br>
                </div>

                <div class="right-section">
                    '.$vide_data_load['video_data'].'
                </div>

                
            ';

            return $show_signle_video;

        }

    }

?>