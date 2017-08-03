<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Center justify text</title>
    </head>
    <body>
        <?php
$text_to_justify=<<<END_TEXT
But think not that this famous town has 
only harpooneers, cannibals, and
bumpkins to show her visitors. Not at
all. Still New Bedford is a queer place.
Had it not been for us whalemen, that
tract of land would this day perhaps
have been in as howling condition as the
coast of Labrador.
        
END_TEXT;
       // echo str_replace("\n", "<br>", $text_to_justify);
        $next_line=0;
        $previous_line=0;
        $text_to_justify= str_replace("\r\n", "\n", $text_to_justify);
        $lines_in_text= substr_count($text_to_justify, "\n");
        $justified_length=47;
        $justified_text="\n";
        for($i=0;$i<$lines_in_text;$i++)
        {
            $previous_line=$next_line;
            $next_line=strpos($text_to_justify,"\n",$previous_line+1);
            $justified_line=substr($text_to_justify, $previous_line, $next_line-$previous_line);
            //echo strlen($justified_line);
            //echo "<br>";
            //echo $justified_line."<br>";
            while(strlen($justified_line)<$justified_length&&$i<$lines_in_text-1)
            {
                for($j=0;$j<$justified_length;$j++)
                {
                    if($j<strlen($justified_line))
                        if($justified_line[$j]===" " && strlen($justified_line)<$justified_length)
                        {
                            $justified_line=substr_replace($justified_line," ",$j,0);
                            //echo "$justified_length"."<br>".strlen($justified_line);  
                            //echo "<pre>$justified_line<br></pre>";
                            $j++;
                        } 
                }    
            }            
            $justified_text.=$justified_line."\n";
        }
        str_replace("\n", "<br>",$justified_text);
        ?>
        <h2>Text to justify</h2>
        
        <?php
        echo "<pre>$text_to_justify<pre><br>";
        echo "<h2>Justified Text</h2>";
        echo "<pre>$justified_text</pre>";
        ?>
    </body>
</html>
