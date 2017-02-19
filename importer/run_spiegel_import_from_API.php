
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

            $api_source = 'https://extraction.import.io/query/extractor/33ed5280-ad5a-4cda-bc3c-9f3cfd6fdc9c?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=';
            $urls = [
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/0/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/1/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/2/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/3/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/4/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/5/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/6/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/7/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/8/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/9/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/10/pagination-display/21',
                'http://www.spiegelgrachtjuweliers.nl/nl/product/horloges/pagination-page/11/pagination-display/21'
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
                $product_title = $watch->{'Productlefttitle value'}[0]->text;
                $product_title_2_string = $watch->{'Productleftblock value'}[0]->text;
                $search_replace_title = array(' 18 maanden garantie.',' 18 Maanden garantie.', '18 maanden garantie.');
                $product_title_2 = str_replace( $search_replace_title,'', $product_title_2_string);

                $product_img = $watch->{'Productright image'}[0]->src;
                $product_link = $watch->{'Meer link'}[0]->href;     

                $product_price_string = $watch->{'Information price'}[0]->text;
                $search_replace = array('€ ',',00','.');
                $product_price = str_replace( $search_replace,'', $product_price_string);
     
              ?>

              <?php
      
              $sql = "INSERT INTO watchclub_data (watch_title_1, watch_title_2, store, price, price_string, image, url)
                 VALUES ('$product_title', '$product_title_2','Spiegel', '$product_price', '$product_price_string',  '$product_img', '$product_link')";

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

