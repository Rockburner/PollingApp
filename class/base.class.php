<?php
/**
 *  Base class for entire system
 */

class base {

  protected $ts = null;

  public function __construct() {
    $this->ts("[".$this->tsts()."]",'Page initiated at : ');    
  }

/**
 *  basic method to output hyper text markup elements
 *
 *  @param  [string] $e   [element name]
 *  @param  [string/array] $a   [optional :element attributes]
 *  @param  [string] $c   [optional : the element 'inner']
 *  @param  [string] $com [optional : a comment string to go after the element]
 *
 *  @return [string]      [the markup output]
 */

  protected function tag($e,$a=null,$in=null,$com=null) {
    $n = array('0'=>array(null,null),'1'=>array("\n",null),'2'=>array(null,"\n"),'3'=>array("\n","\n"));
    $t = array('html'=>3,'head'=>3,'title'=>2,'meta'=>2,'link'=>2,'script'=>2,'noscript'=>2,'body'=>3,'div'=>3,'h1'=>2,'h2'=>2,'h3'=>2,'h4'=>2,'h5'=>2,'h6'=>2,'p'=>2,'ul'=>3,'li'=>2,'img'=>0,'map'=>3,'area'=>2,'table'=>3,'caption'=>2,'tbody'=>3,'thead'=>3,'tfoot'=>3,'tr'=>3,'th'=>2,'td'=>2,'form'=>3,'fieldset'=>3,'legend'=>3,'label'=>0,'input'=>2,'select'=>3,'textarea'=>3,'br'=>2,'pre'=>3,'urlset'=>3,'url'=>3,'loc'=>2,'priority'=>2,'lastmod'=>2,'changefreq'=>2,'section'=>3,'nav'=>3,'article'=>3,'aside'=>3,'hgroup'=>3,'header'=>3,'footer'=>3,'main'=>3,'figure'=>3,'figcaption'=>0,'data'=>0,'time'=>0,'mark'=>0,'wbr'=>0,'small'=>0,'embed'=>3,'video'=>3,'svg'=>3,'canvas'=>3,'math'=>3,'source'=>3,'details'=>3,'summary'=>3,'menu'=>3);
    $sc = array('img','br','area','input','meta','link');
    $nn = 0;
    if(isset($t[$e])) { $nn = $t[$e]; }
    $c = null;
    if($this->comments) { 
      $c = "<!-- ".
        ((isset($a['id'])) ? "#".$a['id']." " : null).
        ((isset($a['class'])) ? ".".$a['class']." " : null).
        (($com) ? $com : null).
        " -->";
    }
    if($e == 'script') {  
      $in = ($in) ? "\n// <![CDATA[\n".$in."\n// ]]>\n" :  ";";  
    }
    $attributes = null;
    if(is_array($a)) { 
      foreach($a as $a=>$v) { 
        if(!is_null($v)) { 
          if($v === true) { $attributes .= " ".$a." "; }
          else { $attributes .= " ".$a."=\"".$v."\"";  }
        } 
      } 
    }
    else { $attributes = $a; }
    if(in_array($e,$sc)) { return "<".$e.$attributes." />".$c.$n[$nn][1]; }
    else { return "<".$e.$attributes.">".$n[$nn][0].$in.$c."</".$e.">".$n[$nn][1]; }
  }


// function to handle the troubleshooting data output request
  protected function ts($a,$t=null) {
    if(!$t) { $t = debug_backtrace()[1]['function']; }
    $this->ts .= $this->tag('pre',null,
      $this->tag('b',null,$this->tsts()." : ").
      $this->disp($a,$t)
    );
    return $this->cdisp($a,$t);
  }

  // troubleshoot timestamp
  public function tsts() {
    $mt = microtime(true);
    @list($t, $f) = explode('.', $mt);
    return date('H:i:s', (int)$t) . '.' . $f;
  }


  // function to output the troubleshooting data
  private function disp($a,$t=null) {
    static $x = 0;
    $i = '_'.$x;
    $x++;
    $o = null;
    $t = "[".$t."]"."&nbsp;=>&nbsp;";
    if(is_array($a)) {
      $c = 'hidden';
      $t .= "ARRAY ";
      $o .= "(\n";
      foreach($a as $k=>$v) { $o .= $this->disp($v,$k);  }
      $o .= $this->tag('br').")";
    }
    elseif(is_object($a)) { 
      $o .= 'OBJECT'; 
      $c = ''; 
    }
    else { 
      $o .= $a; $c = ''; 
    }
    return $this->tag('a',array('onclick'=>"jQuery('#".$i."').toggleClass('hidden');"),$t).
      $this->tag('em',array('id'=>$i,'class'=>$c),$o)."\n";
  }


  // TROUBLESHOOTING with cog//
  private function cdisp($a,$t=null) {
    static $x = 0;
    $i = '_'.$x;
    $x++;
    $o = $c = null;
    $t = "[".$this->tsts()." : ".$t."]"."&nbsp;=>&nbsp;";
    if(is_array($a)) {
      $t .= "ARRAY ";
      $o .= "(";
      foreach($a as $k=>$v) { $o .= $this->cdisp($v,$k);  }
      $o .= ")";
    }
    elseif(is_object($a)) { $o .= 'OBJECT';  }
    else { $o .= $a; $c = ' revealed'; }
    return $this->tag('div',array('class'=>'reveal'.$c),
      $this->tag('span',array('class'=>'reveal-head reveal-toggle'),$t).
      $this->tag('span',array('id'=>$i,'class'=>'reveal-body inline'),$o)
    );
  }
}
