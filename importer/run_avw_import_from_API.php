
    <!-- AWCO watches //from CSV -->

            <?php

            //connect to DB

            $servername = "****";
            $username = "****";
            $password = "****";
            $dbname = "****";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            ?>
             <?php
            // set URL's that need to be scraped

            $api_source = 'https://extraction.import.io/query/extractor/7c408694-b6f3-41c2-8ab2-264102c8a8dc?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=';
            $urls = [
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/1/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/2/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/3/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/4/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/5/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/6/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/7/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/8/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/9/',
                'https://amsterdamvintagewatches.com/product-category/wrist-watches/page/10/'
                     ];
            ?>

            <?php foreach($urls as $scrape_url): ?>
            <?php
            // copy file content into a string var
            $full_url = $api_source . $scrape_url;
            $json_file = file_get_contents($full_url);
            // convert the string to a json object
            $jfo = json_decode($json_file);
            ?>

            
            <?php 
                $data = $jfo->extractorData->data[0]->group;
             ?>


            <?php foreach($data as $watch): ?>
             <?php 
                $product_title = $watch->{'Productname link'}[0]->text;
                $product_img = $watch->{'Productimg image'}[0]->src;
                $product_link = $watch->{'Productname link'}[0]->href;

                $product_price_string = $watch->{'Product price'}[0]->text;
                $search_replace = array('€ ',',00','.');
                $product_price = str_replace( $search_replace,'', $product_price_string);

     
              ?>

              <?php
      
              $sql = "INSERT INTO watchclub_data (watch_title_1, store, price, price_string, image, url)
                 VALUES ('$product_title', 'AVW', '$product_price', '$product_price_string',  '$product_img', '$product_link')";

                 if ($conn->query($sql) === TRUE) {
                     echo "New record created successfully";
                 } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                 }

              ?>
            
            <?php endforeach; ?>
            <?php endforeach; ?>

            <? 
                //Close connection
                $conn->close();
            ?>

