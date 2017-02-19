
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

            $api_source = 'https://extraction.import.io/query/extractor/efd1829b-3aa1-4252-81c2-ed5bf08fbd28?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=';
            $urls = [
                'http://awco.nl/product-categorie/vintage-collectie/page/1',
                'http://awco.nl/product-categorie/vintage-collectie/page/2',
                'http://awco.nl/product-categorie/vintage-collectie/page/3',
                'http://awco.nl/product-categorie/vintage-collectie/page/4',
                'http://awco.nl/product-categorie/vintage-collectie/page/5',
                'http://awco.nl/product-categorie/vintage-collectie/page/6',
                'http://awco.nl/product-categorie/vintage-collectie/page/7',
                'http://awco.nl/product-categorie/vintage-collectie/page/8',
                'http://awco.nl/product-categorie/vintage-collectie/page/9',
                'http://awco.nl/product-categorie/vintage-collectie/page/10',
                'http://awco.nl/product-categorie/vintage-collectie/page/11',
                'http://awco.nl/product-categorie/vintage-collectie/page/12',
                'http://awco.nl/product-categorie/vintage-collectie/page/13'

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
                $product_img = $watch->{'Product image'}[0]->src;

                $product_price_string = $watch->{'Amount price'}[0]->text;
                $search_replace = array('€ ',',00','.');
                $product_price = str_replace( $search_replace,'', $product_price_string);

                $product_link = $watch->{'Producttype link'}[0]->href;
                $product_model = $watch->{'Producttype link'}[0]->text;
              ?>

              <?php
      
              $sql = "INSERT INTO watchclub_data (watch_title_1, watch_title_2, store, price,  image, url)
                 VALUES ('$product_title', '$product_model', 'AWCO', '$product_price',  '$product_img', '$product_link')";

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

