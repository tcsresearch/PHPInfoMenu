<?php
ob_start();
    $exts = get_loaded_extensions();
    phpinfo();
    $phpinfo = ob_get_contents();
    ob_end_clean();
    //print $phpinfo;
    $html_str = $phpinfo;
    $html = new DOMDocument();
    $html->loadHTML($html_str);
    $title = $html->getElementsByTagName("title")->item(0);
    $title->nodeValue = "PHP Version ".phpversion();
    $body = $html->getElementsByTagName("body")->item(0);
    
    $body->setAttribute("style", "background-color:beige;");
    $table = $body = $html->getElementsByTagName("table")->item(3)->nextSibling;
    $head  = $html->getElementsByTagName("table")->item(0)->nextSibling;
    ob_start();
    ?>
    <h2><a name="session_variables">Session variables</a></h2>
    <table border="0" cellpadding="2" width="600">
    <tr class="h"><th>Variables</th><th>Value</th></tr>
    <?php foreach($_SESSION as $key=>$value){ 
        if(is_bool($value)){
            $value = ($value)?"true":"false";
        }else if(is_array($value)){
            $value = '<pre>'.print_r($value, true).'</pre>';
        }else if(empty($value) && $value != "0"){
            $value = "<i>no value</i>";
        }
    ?>
    <tr>
        <td class="e"><?=$key?></td>
        <td class="v"><?=$value?></td>
    </tr>
    <?php
    }
    ?>
    </table>
    
    <h2><a name="loaded_extensions">loaded extensions</a></h2>
    <table border="0" cellpadding="2" width="600">
    <tr class="h"><th>Extension</th><th>Version</th></tr>
    <?php 
        
        natcasesort($exts);
    foreach($exts as $value){
        $version = phpversion($value);    
    ?>
    <tr>
        <td class="e" style="width:150px;"><a href="#module_<?=$value?>" style="color:black; background-color:#ccccff;"><?=$value?></a></td>
        <td class="v"><?=(!empty($version))?$version:"<i>Unknown</i>" ?></td>
    </tr>
    <?php
    }
    ?>
    </table><br />
    <?php
    $txt_str = ob_get_contents();
    ob_end_clean();
    $txt = new DOMDocument();
    $txt->loadHTML($txt_str);
    $txt_body = $txt->getElementsByTagName("body")->item(0);

    foreach($txt_body->childNodes as $child){
        $child = $html->importNode($child, true);
        $table->parentNode->insertBefore($child, $table);
    }
    
    $h2 = $html->getElementsByTagName("h2");
    foreach($h2 as $item){
        if($item->getElementsByTagName("a")->length == 0){
            $value = $item->nodeValue;
            $item->nodeValue = "";
            $a = $html->createElement("a");
            $a->setAttribute("name", strtolower(str_replace(" ", "_", $value)));
            $a->nodeValue = $value;
            $item->appendChild($a);
        }
        $a = $item->getElementsByTagName("a")->item(0);
        
        if(!in_array($a->nodeValue, $exts)){
            $menu[strtolower(str_replace(" ", "_", $a->nodeValue))] = $a->nodeValue;
        }
        $top_a = $html->createElement("a");
        if(!in_array($a->nodeValue, $exts)){
            $txt = $html->createTextNode("(Go to top)"); 
            $top_a->appendChild($txt);
            $top_a->setAttribute("href", "#");
        }else{
            $txt = $html->createTextNode("(Go to extensionlist)"); 
            $top_a->appendChild($txt);
            $top_a->setAttribute("href", "#loaded_extensions");
        }
        $top_a->setAttribute("style", "background-color:beige; font-size:12px; margin-left:5px; margin-top:-5px; color:black;");
        $item->appendChild($top_a);        
    }
    ob_start();
    ?>
    <br />
    <table border="0" cellpadding="2" width="600">
    <tr class="h"><th colspan="2">Sections</th></tr>
    <tr>
        <?php
        $i = 0;
        foreach($menu as $key=>$item){
            print "<td class='v'><a href='#$key' style='background-color:#cccccc; color:black;'>$item</a></td>";
            if($i%2){
                print '</tr><tr>';
            }
            $i++;
        }
        if($i%2){
            print '<td class="v"></td>';
        }
        ?>
    </tr>
    </table>
    
    <?php
    $txt_str = ob_get_clean();
    $txt = new DOMDocument();
    $txt->loadHTML($txt_str);
    $txt_body = $txt->getElementsByTagName("body")->item(0);
    foreach($txt_body->childNodes as $child){
        $child = $html->importNode($child, true);
        $table->parentNode->insertBefore($child, $head);
    }
    print $html->saveHTML();
?>
