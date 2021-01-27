<?php



class App
{
    public static $endpoint = "http://localhost/Webshop/api.php";
    public static function main()
    {
        try {
            $products = self::getData();
            self::viewDataW($products);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function getData()
    {
        $json = @file_get_contents(self::$endpoint);
        if (!$json) {
            throw new Exception("
 <div class='alert alert-danger' role='alert'>
 Problem med att hämta produkter just nu!
 </div>
 ");
        }
        return json_decode($json, true);
    }
    public static function viewDataW($products)
    {
        $table = "";
        foreach ($products as $key => $value) {
            $table .= "
            
            <div>
                <div class='timeline-heading'>
                    <img -fluid' src='/webshop/assets/img/books/$value[image]' >
                    <h4>$value[title]</h4>
                    
                </div>
                <div class='timeline-body'><p class='text-muted'>$value[description]</p></div>
                <h4 class='subheading'> Pris: $value[price]</h4>
                    <h4 class='subheading'>Antal i lager:  $value[antal]</h4>
                    <button class='btn btn-primary btn-xl text-uppercase' id='sendMessageButton' type='submit>Send Message</button>
                    
        <button type='button'>Köp</button><hr>
            </div>
            ";
        }
        echo $table;
        
    }
}
