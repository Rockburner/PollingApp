<?php

class form extends markup {

  public $form = null;

  public $action = null;
  public $method = null;
  public $id = null;
  public $class = null;

  private $m = null;

  public function __construct() {
  }

  public function form () {
    if($this->m) { 
      $this->fieldset();
    }
    return $this->t('form',
      array(
        'action'=>$this->action,
        'method'=>$this->method,
        'id'=>$this->id,
        'class'=>$this->class
      ),
      $this->form
    );
  }

  public function fieldset() {
    $this->form .= $this->t('fieldset',null, $this->m );
    $this->m = null;
  }

  public function legend($t=null) {
    $this->m .= $this->t('legend',null,$t);
  }

  public function para($t=null,$a=null) {
    $this->m .= $this->t('p',$a,$t);
  }

  /* FUNCTION TO CHECK VALUES SENT TO FUNCS - IF SENT AN ARRAY, CHECKS FOR THE APPROPRIATE KEY (using $n) AND RETURN THE VALUE IF EXISTS */
  protected function chV($v=null,$n=null) { 
    if($v == null) { return null; } // RETURN A NULL OR EMPTY VALUE
    if(is_array($v)) {  // IF AN ARRAY OF DATA HAS BEEN SENT 
      if(isset($v[$n])) { return $v[$n]; } // IF THE CORRECT KEY IS WITHIN THE DATA ARRAY - RETURN THE VALUE
      else { return null; } // IF THE CORRECT KEY IS NOT IN THE DATA ARRAY - RETURN NULL
    } 
    else return $v; // IF $v IS NON-ARRAY DATA - RETURN THE VALUE
  }
  protected function label($n=null,$l=null,$c=null) { 
    if($l == ' ') { $l = '&nbsp;'; }
    if(!empty($l)) { return $this->t('label',array('for'=>(($n) ? $n : null),'class'=>(($c)?$c:null)),$l); }
    else { return null; }
  }


  protected function input($t,$n,$v=null,$c=null,$j=null,$d=1,$dis=false,$src=null,$alt=null,$chars=null,$i=false,$p=null,$min=null,$max=null,$step=null) { //type,name,value,class,javascript,default value (checkboxes),disabled,image src, image alt, maxsize, showId (for hidden),placeholder,min,max,step
    if(!$c) { $c = $t; }
    else { $c = $t." ".$c; }
    $attr = array('type'=>$t,'class'=>$c,'name'=>$n,'disabled'=>(($dis) ? "disabled" : null),'placeholder'=>$p,'min'=>$min,'max'=>$max,'step'=>$step);
    if($t == 'image') { 
      if(!empty($src)) { $attr['src'] = $src; }
      if(!empty($alt)) { $attr['alt'] = $alt; }
    }
    if($t == 'text' && !empty($chars)) { $attr['maxlength'] = $chars; }
    if($t == 'radio') { $attr['id'] = $n."_".$v; }
    elseif($n && (($t == 'hidden' && $i) || ($t != 'hidden'))) { $attr['id'] = $n; }
    if($i && $t != 'hidden') { $attr['id'] = $i; }
    if($t == 'radio' && $v == $d) { $attr['checked'] = "checked"; }
    if($t == 'checkbox') { 
      if($v == $d) { $attr['checked'] = "checked"; }
      $attr['value'] = $d;
    }
    else { $attr['value'] = $v; }
    if($j) { $attr = array_merge($attr,$j); }
    return $this->t('input',$attr);
  }


  protected function select($n,$opts=null,$j=null,$dis=false,$c=null) {
    $attr = array('name'=>$n,'id'=>$n,'class'=>$c,'disabled'=>(($dis) ? 'disabled' : null));
    if($j) { $attr = array_merge($attr,$j); }
    return $this->t('select',$attr,$opts);
  }
  

  protected function div($n,$e=null,$content=null,$cl=null) { // name of field also used to CLASS div.
    $this->m .= $this->t('div',array('class'=>$n.' '.$cl.(($e) ? " error": null)),$content);
  }

  protected function html5field($t,$n,$l=null,$v=null,$e=null,$j=null,$dis=null,$chars=null,$c=null,$i=null,$p=null,$min=null,$max=null,$step=null,$cl=null) {
    $v = $this->chV($v,$n);
    $e = $this->chV($e,$n);
    $disHidden = $h = null;
    if($dis) { 
      $disHidden = $this->inputHidden($n,$v); 
      $dis = " disabled";
    }
    if(is_array($l)) {
      $h = $this->hint($l['hint'],$n);
      $l = $l['label'];
    }
    $this->div(
      $n.$dis,
      $e,
        $this->label($n,$l.(($chars)? $this->t('br').$this->t('span',null,"(".$chars." chars)") :null),'text').
        $this->input($t,$n,$v,$c,$j,null,$dis,null,null,$chars,$i,$p,$min,$max,$step).
        $disHidden.
        $h,
      (($cl) ? $cl : $c));
  }

  public function inputText($n,$l=null,$v=null,$e=null,$j=null,$dis=null,$chars=null,$c=null,$i=null,$p=null,$cl=null) { // name,label text, value,error,javascript,disabled,character limit,input class,id,placeholder,div class
    $v = $this->chV($v,$n);
    $e = $this->chV($e,$n);
    $disHidden = $h = null;
    if($dis) { 
      $disHidden = $this->inputHidden($n,$v); 
      $dis = " disabled";
    }
    if(is_array($l)) {
      $h = $this->hint($l['hint'],$n);
      $l = $l['label'];
    }
    $content = $this->label($n,$l.(($chars)? $this->t('br').$this->t('span',null,"(".$chars." chars)") :null),'text').$this->input('text',$n,$v,$c,$j,null,$dis,null,null,$chars,$i,$p).$disHidden.$h;
    $this->div($n.$dis,$e,$content,(($cl) ? $cl : $c));
  }

  public function inputPassword($n,$l=null,$v=null,$e=null,$j=null,$dis=null,$cl=null,$p=null) { // name,label text,value,error,javascript,disabled,div class,placeholder
    $v = $this->chV($v,$n);
    $e = $this->chV($e,$n);
    $h =  null;
    if(is_array($l)) {
      $h = $this->hint($l['hint'],$n);
      $l = $l['label'];
    }
    $this->div($n,$e, $this->label($n,$l,'password') . $this->input('password',$n,$v,null,$j,null,$dis,null,null,null,null,$p) .$h,(($cl) ? $cl : $c) );
  }
  public function inputHidden($n,$v=null,$i=false,$j=null) { // $i = USE ID ATTRIBUTE
    $v = $this->chV($v,$n);
    $this->m .= $this->input('hidden',$n,$v,null,$j,null,null,null,null,null,$i);
  }


  public function inputEmail($n,$l=null,$p=null,$v=null,$e=null,$j=null,$dis=null,$chars=null,$c=null,$i=null,$cl=null) { // name,label text,placeholder, value,error,javascript,disabled,class,id,div class
    $this->html5field('email',$n,$l,$v,$e,$j,$dis,$chars,$c,$i,$p,null,null,null,$cl);
  }


  public function inputSelect($n,$l=null,$v=null,$e=null,$arr=null,$o=null,$j=null,$dis=false,$c=null,$cl=null) { //name,label text,value,error,indexed array,top option,javascript,disabled,class,div class
    $v = $this->chV($v,$n);
    $e = $this->chV($e,$n);
    $opts = null;
    if(!empty($o)) { // IF SENT DEFAULT OPTION 
      if(is_array($o)) { foreach($o as $kk=>$vv) { // IF SENT DEFAULT OPTION AS ARRAY
        $attr = array('value'=>$kk);
        if(is_array($vv)) { $title = $vv['title']; $attr['class'] = $vv['class']; }
        else { $title = $vv; }
        $opts .= $this->t('option',$attr,$title); } 
      }
      else { $opts .= $this->t('option',array('value'=>'null'),$o); } // DEFAULT OPTION IS STRING SENT
    } 
    if(is_array($arr)) { // IF SENT OPTIONS IN AN ARRAY
      foreach($arr as $ov=>$ot) { 
        $attr = array('value'=>$ov);
        if(!empty($v) && $ov == $v) { $attr['selected'] = 'selected'; $attr['class'] = 'selected'; }
        if(is_array($ot)) { $title = $ot['title']; $attr['class'] = ((isset($attr['class'])) ? $attr['class']." " : null ) . $ot['class']; }
        else { $title = $ot; }
        $opts .= $this->t('option',$attr,$title); 
      } 
    }
    elseif(is_string($arr)) { $opts .= $arr; } // IF THE OPTIONS HAVE BEEN PRE-CREATED
    $output = $this->select($n,$opts,$j,$dis,$c);
    if($dis) { $output .= $this->inputHidden($n,$v); }
    $h =  null;
    if(is_array($l)) {
      $h = $this->hint($l['hint'],$n);
      $l = $l['label'];
    }
    $this->div($n,$e, $this->label($n,$l,'select') . $output .$h ,$cl);
  }

  public function inputSubmit($n='submit',$v='Submit',$j=null,$dis=null,$i=null,$cl=null,$l=null) {
    $v = $this->chV($v,$n);
    $pc = $n;
    if($n != 'submit') { $pc = 'submit '.$n; }
    $h =  null;
    if(is_array($v)) {
      $h = $this->hint($v['hint'],$n);
      $v = $v['value'];
    }
    $this->div($pc,null, $this->label((($i) ? $i : $n),(($l)?$l:"&nbsp;"),'submit') . $this->input('submit',$n,$v,'',$j,null,$dis,null,null,null,$i) .$h,$cl); // input($t,$n,$v=null,$c=null,$j=null,$d=1,$dis=null,
  }

}
