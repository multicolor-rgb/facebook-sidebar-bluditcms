<?php

class facebookSidebar extends Plugin {

	public function init()
	{
		$this->dbFields = array(
	'facebookname'=>'',
	'positionfromtop'=>'200px',
	'leftorright'=>'',
		);
	}

	public function form()
	{
		global $L;

		$html = '
		

		
		<h4 class="mt-5">Facebook name</h4>
<hr>
		<input type="text" name="facebookname" placeholder="put facebook name url example (from https://www.facebook.com/bluditcms put this only bluditcms)" value="'.$this->getValue('facebookname').'">

		<h4 class="mt-5">Position sidebar</h4>
<hr>
		<p>Position from top</p>

		<input type="text" name="positionfromtop" placeholder="default:200px" value="'.$this->getValue('positionfromtop').'">

		<p class="mt-3">Position left or right</p>

		<select name="leftorright">
		<option value="left" '.($this->getValue('leftorright')==="left"?"selected":"").'>left</option>
        <option value="right" '.($this->getValue('leftorright')==="right"?"selected":"").'>right</option>
		</select>
		
		<div class="bg-light col-md-12 mt-5 py-3 d-block border">
      
		<p>If you want support my work, and you want saw new plugins:) </p>

		<a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
		</a>
		
		</div>
		';

		return $html;
	}


	public function siteHead(){

		$stylefb = '
		<style>
		@media(max-width:960px){
		#fb-left{display:none;}	
		#fb-right{display:none;}	
		}
		
		#fb-left{position:fixed; left:0;top:'.$this->getValue('positionfromtop').';
		transform:translate(-300px,0); z-index:999;
		-webkit-transition: all 1s ease-out;
		-moz-transition: all 1s ease-out;
		-ms-transition: all 1s ease-out;
		-o-transition: all 1s ease-out;
		transition: all 1s ease-out;
		}
						
		#fb-left:hover{transform:translate(0,0); }
		#fb-left:after{content:"f"; padding:20px;font-weight:bold;background:#3b5998;float:right;color:#fff;font-size:20px;
		border-bottom-right-radius:5px;    border-top-right-radius:5px}

		//right

		@media(max-width:960px){
		#fb-right{display:none;}	
		}
									
											
		#fb-right{position:fixed; right:0;top:'.$this->getValue('positionfromtop').';transform:translate(300px,0); z-index:999;
		-webkit-transition: all 1s ease-out;
		-moz-transition: all 1s ease-out;
		-ms-transition: all 1s ease-out;
		-o-transition: all 1s ease-out;
		transition: all 1s ease-out;
		}
											
		#fb-right:hover{transform:translate(0,0);}
		#fb-right:before{content:"f"; padding:20px;font-weight:bold;background:#3b5998;
		float:left;color:#fff;font-size:20px;
		border-bottom-left-radius:5px;    border-top-left-radius:5px}
		</style>';

		echo $stylefb;
		
	}


	public function siteBodyBegin(){
 
		echo '<div id="fb-'.$this->getValue('leftorright').'" class="">
	  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2F';echo 'https://web.facebook.com/'.$this->getValue('facebookname').'?_rdc=1&_rdr&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>  
	  </div>';

	}
}