<?php
    
    //Getting Data form Forms
    $fmenu=$_POST['menu'];
    $fitem=$_POST['item'];
    $fprice=$_POST['price'];

    //Declaring new 
    $xml=new DOMDocument("1.0","UTF-8");
    $xml->formatOutput=true;
    $xml->preserveWhiteSpace=false;
    $xml->load("menu.xml"); //load the already existing xml.

        if(!$xml){
            //if there's no document root 
            $information=$xml->createElement("information");
            $xml->appendChild($information);
        }
        else {
            //if theres document root then make <information> the first child
            $information=$xml->firstChild;
        } 
        
            //add another element userdata under information
            $userdata=$xml->createElement("userdata");
            $information->appendChild($userdata);
            
            //new element -> menu and adding under userdata
            $menu=$xml->createElement("menu",$fmenu);
            $userdata->appendChild($menu);
            
            //new element -> item and adding under userdata
            $item=$xml->createElement("item",$fitem);
            $userdata->appendChild($item);
            
            //new element -> price and adding under userdata
            $price=$xml->createElement("price",$fprice);
            $userdata->appendChild($price);

            //Saving the files
            //echo "<xmp>".$xml->saveXML()."</xmp>";
            echo "File saved successfully";
            $xml->save("menu.xml");

       

?>