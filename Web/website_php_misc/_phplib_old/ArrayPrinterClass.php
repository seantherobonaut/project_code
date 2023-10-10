<?php
    class ArrayPrinter
    {
        //Recursively calls itself to go through an array and output all nested cells
        //An old legacy function I'm quite fond of
        public static function array_recursion(Array $inputArray, $output = "", $numTabs = 0)
        {
            foreach($inputArray as $key => $value)
            {
                if(is_array($value))
                {
                    for($i=0; $i < $numTabs; $i++)
                        $output .= "\t";

                    $output .= '['.$key.']=> Array'."\n";
                    $numTabs++;

                    $output = self::array_recursion($value, $output, $numTabs);
                }
                else
                {
                    for($i=0; $i < $numTabs; $i++)
                        $output .= "\t";

					if(!is_object($value))                    
                    	$output .= '['.$key.']=> '.$value."\n";
                    else
                    	$output .= '['.$key.']=> Object:'.get_class($value)."\n";
                }
            }
            $numTabs--;   

            return $output;
        }

        private static function prepareArrayBasic(Array $array)
        {
            $output = print_r($array, true);
            $output = str_replace("\n\n", "\n", $output);
            $output = str_replace("    ", "  ", $output);

            $begin = 0;
            $end = 0;
            $target = "(\n";
            $replace = "";    
            while(($begin = strpos($output, $target, $begin)) !== FALSE)
            {       
                $end = $begin+strlen($target);
                while($begin > 0 && $output[$begin] != "\n")
                    $begin--;

                $output = substr_replace($output,$replace,$begin,($end-$begin-strlen("\n")));
            }

            $begin = 0;
            $end = 0;
            $target = ")\n";
            $replace = "";    
            while(($begin = strpos($output, $target, $begin)) !== FALSE)
            {       
                $end = $begin+strlen($target);
                while($begin > 0 && $output[$begin] != "\n")
                    $begin--;

                $output = substr_replace($output,$replace,$begin,($end-$begin-strlen("\n")));
            }    

            //Finishing touches
            $find = strpos($output, "[", 0);
            $output = substr_replace($output,"",0,($find));
            $output = "  ".$output;
            $output = str_replace("  [", "[", $output);  
            $output = str_replace(" =>", "=>", $output); 

            //Convert spaces to tabs
            $output = str_replace("    ", "\t", $output);

            return $output;            
        }

        private static function prepareArrayAdvanced(Array $array)
        {
            ob_start();
                var_dump($array);
            $output = ob_get_clean();    

            //Equalize all spaces after => and remove newline after them
            $output = str_replace("=>\n", "=>", $output);
            $begin = 0;
            $end = 0;
            $target = "=>";
            $replace = " ";
            while(($begin = strpos($output, $target, $begin)) !== FALSE)
            {
                //End starts at Begin, move position of End along until something other than a space is encoutered
                //Start search after the length of the target
                $begin = $begin+strlen($target);
                $end = $begin;
                while($end < strlen($output) && $output[$end] == " ")
                    $end++;

                $output = substr_replace($output,$replace,$begin,($end-$begin));
            }

            //Remove all curly braces and spaces
            $output = str_replace("{\n", "\n", $output);    
            $output = str_replace("}\n", "\n", $output); 

            //Remove all duplicated newlines   
            $begin = 0;
            $end = 0;
            $cutPos = 0;
            $target = "\n";
            $replace = "";    
            while(($begin = strpos($output, $target, $begin)) !== FALSE)
            {
                //Start search after the length of the target
                $begin = $begin+strlen($target);
                $end = $begin;
                $cutPos = $begin;
                while($end < strlen($output) && $output[$end] != "[")
                {
                    if($output[$end] == $target)
                        $cutPos = $end;

                    $end++;
                }

                //If any newlines are found before next array item starts, erase them
                if($cutPos != $begin)
                    $output = substr_replace($output,$replace,$begin,($cutPos+strlen($target)-$begin));
            }

            //Remove first array() instance and indent all items left one time
            $find = strpos($output, "\n", 0);
            $output = substr_replace($output,"",0,($find+strlen("\n")));
            $output = str_replace("  [", "[", $output);

            //Convert spaces to tabs
            $output = str_replace("  ", "\t", $output);

            return $output;             
        }        

        public static function getString(Array $input, $detail = '')
        {                
            if($detail == 'adv')
                $output = self::prepareArrayAdvanced($input);
            else
                $output = self::prepareArrayBasic($input);       

            return $output;
        }

        public static function getHTML(Array $input, $detail = '')
        {
            if($detail == 'adv')
                $output = self::prepareArrayAdvanced($input);
            else
                $output = self::prepareArrayBasic($input);

            $output = str_replace("\n", "<br>", $output);       
            $output = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;", $output);       

            return $output;
        }

        //Removes [#] keys from a string array
		public static function removeKeys($inputArray)        
		{
            $begin = 0;
            $end = 0;

            while(($begin = strpos($inputArray, "[", $begin)) !== FALSE)
            {            
                $end = $begin;
                while($end < strlen($inputArray) && $inputArray[$end] != ">")
                    $end++;

                $inputArray = substr_replace($inputArray,"",$begin,($end-$begin+2));            
            }

			return $inputArray;
		}
    }
?>
