<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Json {
	
	var $json;

	function __construct(){
		$this->json = new JsonObject();
	}
	
	function json_encode($data = null){
		if(!is_array($data)) return false;
		if(function_exists("json_encode")){
		  return json_encode($data);
		}else{
		  return $this->json->array2Json($data);
		}
	}

	function json_decode($data = null){
		if($data == null) return false;
		if(function_exists("json_decode")){
		  return json_decode($data);
		}else{
		  return $this->json->Json2array($data);
		}
	}
}

class JsonObject{
	function array2Json($array,$tabs=""){
		if(is_array($array) && (array_keys($array) !== range(0, sizeof($array) - 1))){
			foreach($array as $k=>$v){
				if(is_array($v)=="array"){
					$v1=$this->array2Json($v,$tabs);
				}elseif(gettype($v)=="boolean"){
					$v1= $v ? "true" : "false";
				}elseif(gettype($v)=="integer"){
					$v1= (int)$v;
				}elseif(gettype($v)=="double"||gettype($v)=="float"){
					$v1= (float)$v;
				}else{
					
					$v1=preg_replace("/(\r\n)/",'\n',addslashes(htmlspecialchars($v)));
					$v1="\"".preg_replace("/[\r\n]/",'\n',$v1)."\"";
				}
				$ret[]="$k : $v1";
			}
			if(isset($ret) && is_array($ret)){
				$return=implode(",",$ret);
				return "{".$return."}";
			}else{
				return '[]';
			}
		}elseif(is_array($array) && (array_keys($array) == range(0, sizeof($array) - 1))){
			foreach($array as $k=>$v){
				if(gettype($v)=="array"){
					$v1=$this->array2Json($v,$tabs);
				}elseif(gettype($v)=="boolean"){
					$v1= $v ? "true" : "false";
				}elseif(gettype($v)=="integer"){
					$v1= (int)$v;
				}elseif(gettype($v)=="double"||gettype($v)=="float"){
					$v1= (float)$v;
				}else{
					$v1=preg_replace("/(\r\n)/",'\n',addslashes(htmlspecialchars($v)));
					$v1="\"".preg_replace("/[\r\n]/",'\n',$v1)."\"";
				}
				$ret[]="$v1";
			}
			if(is_array($ret)){
				$return=implode(",",$ret);
				return "[$return]";
			}
		
		}else{
			return "";
		}
	}
	
	function Json2array($json, $assoc=FALSE, /*emu_args*/$n=0,$state=0,$waitfor=0) {
		if(substr($json,-1,1)==";"){
			$json=substr($json,0,strlen($json)-1);
		}
	      #-- result var
	      $val = NULL;
	      static $lang_eq = array("true" => TRUE, "false" => FALSE, "null" => NULL);
	      static $str_eq = array("n"=>"\012", "r"=>"\015", "\\"=>"\\", '"'=>'"', "f"=>"\f", "b"=>"\b", "t"=>"\t", "/"=>"/");

	      #-- flat char-wise parsing
	      for (/*n*/; $n<strlen($json); /*n*/) {
	         $c = $json[$n];

	         #-= in-string
	         if ($state==='"') {
	            if ($c == '\\') {
	               $c = $json[++$n];
	               if (isset($str_eq[$c])) {
	                  $val .= $str_eq[$c];
	               }
	               elseif ($c == "u") {
	                  $val .= "\\u";
	               }
	               else {
	                  $val .= "\\" . $c;
	               }
	            }
	            elseif ($c == '"') {
	               $state = 0;
	            }
	            else {
	               $val .= $c;
	            }
	         }

	         #-> end of sub-call (array/object)
	         elseif ($waitfor && (strpos($waitfor, $c) !== false)) {
	            return array($val, $n);  // return current value and state
	         }

	         #-= in-array
	         elseif ($state===']') {
	            list($v, $n) = $this->Json2array($json, 0, $n, 0, ",]");
	            $val[] = $v;
	            if ($json[$n] == "]") { return array($val, $n); }
	         }

	         #-= in-object
	         elseif ($state==='}') {
	            list($i, $n) = $this->Json2array($json, 0, $n, 0, ":");   // this allowed non-string indicies
	            list($v, $n) = $this->Json2array($json, 0, $n+1, 0, ",}");
	            $val[$i] = $v;
	            if ($json[$n] == "}") { return array($val, $n); }
	         }

	         #-- looking for next item (0)
	         else {

	            #-> whitesapce
	            if (preg_match("/\s/", $c)) {
	               // skip
	            }

	            #-> string begin
	            elseif ($c == '"') {
	               $state = '"';
	            }

	            #-> object
	            elseif ($c == "{") {
	               list($val, $n) = $this->Json2array($json, $assoc, $n+1, '}', "}");
	               if ($val && $n && !$assoc) {
	                  // $obj = new stdClass();
	                  // 	                  foreach ($val as $i=>$v) {
	                  // 	                     $obj->{$i} = $v;
	                  // 	                  }
					$obj=array();
						foreach ($val as $i=>$v) {
		                 $obj[$i] = $v;
		                }
	                  $val = $obj;
	                  unset($obj);
	               }
	            }
	            #-> array
	            elseif ($c == "[") {
	               list($val, $n) = $this->Json2array($json, $assoc, $n+1, ']', "]");
	            }

	            #-> comment
	            elseif (($c == "/") && ($json[$n+1]=="*")) {
	               // just find end, skip over
	               ($n = strpos($json, "*/", $n+1)) or ($n = strlen($json));
	            }

	            #-> numbers
	            elseif (preg_match("#^(-?\d+(?:\.\d+)?)(?:[eE](-?\d+))?#", substr($json, $n), $uu)) {
	               $val = $uu[1];
	               $n += strlen($uu[0]) - 1;
	               $val = strpos($val, ".") ? (float)$val : (int)$val;
	               if (isset($uu[2])) {
	                  $val *= pow(10, (int)$uu[2]);
	               }
	            }

	            #-> boolean or null
	            elseif (preg_match("#^(true|false|null)\b#", substr($json, $n), $uu)) {
	               $val = $lang_eq[$uu[1]];
	               $n += strlen($uu[1]) - 1;
	            }

	            #-- parsing error
	            else {
	               // PHPs native Json2array() breaks here usually and QUIETLY
	              trigger_error("Json2array: error parsing '$c' at position $n", E_USER_WARNING);
	               return $waitfor ? array(NULL, 1<<30) : NULL;
	            }

	         }//state

	         #-- next char
	         if ($n === NULL) { return NULL; }
	         $n++;
	      }//for

	      #-- final result
	      return ($val);
	   }
}
?>