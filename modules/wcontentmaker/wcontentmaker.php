<?php
/*************************************
/* Made By Wozia Dev Team
/* http://wozia.pt
/***********************************/
class wcontentmaker extends Module
{
	protected $maxImageSize = 9999999; //<- image size 
	function __construct()
	{
		$this->name = 'wcontentmaker';
		$this->tab = 'Wozia - Custom Modules';
		$this->version = '0.01';

		parent::__construct();

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('wContent-maker');
		$this->description = $this->l('wContent for adding banners');
	}

	function install()
	{
		if (!parent::install())
			return false;
		if (!$this->registerHook('rightColumn'))
			return false;
		return true;
	}

	function hookLeftColumn($params){return $this->hookRightColumn($params);}
	function hookCenter($params){ return $this->hookRightColumn($params);}
	function hookFooter($params){ return $this->hookRightColumn($params);}
	function hookHome($params){return $this->hookRightColumn($params);}
	function hookTop($params){return $this->hookRightColumn($params);}
	function hookHeader($params){return $this->hookRightColumn($params);}
	function hookCustomerAccount($params){return $this->hookRightColumn($params);}
	function hookCreateAccountForm($params){return $this->hookRightColumn($params);}
	function hookCreateAccount($params){return $this->hookRightColumn($params);}
	function hookCreateAccountTop($params){return $this->hookRightColumn($params);}
	function hookAdminCustomers($params){return $this->hookRightColumn($params);}
	function hookOrderConfirmation($params){return $this->hookRightColumn($params);}
	function hookUpdateOrderStatus($params){return $this->hookRightColumn($params);}
	function hookProductFooter($params){return $this->hookRightColumn($params);}
	function hookPaymentReturn($params){return $this->hookRightColumn($params);}
	function hookBackBeforePayment($params){return $this->hookRightColumn($params);}
	function hookShoppingCartExtra($params){return $this->hookRightColumn($params);}
	function hookPayment($params){return $this->hookRightColumn($params);}
	function hookCancelProduct($params){return $this->hookRightColumn($params);}
	function hookNewOrder($params){return $this->hookRightColumn($params);}
	function hookShoppingCart($params){return $this->hookRightColumn($params);}
	function hookOrderReturn($params){return $this->hookRightColumn($params);}
	function hookMyAccountBlock($params){return $this->hookRightColumn($params);}
	function hookExtraRight($params){return $this->hookRightColumn($params);}
	function hookExtraLeft($params){return $this->hookRightColumn($params);}
	function hookAuthentication($params){return $this->hookRightColumn($params);}
	function hookProductTabContent($params){return $this->hookRightColumn($params);}
	function hookProductTab($params){return $this->hookRightColumn($params);}
	function hookProductOutOfStock($params){return $this->hookRightColumn($params);}
	function hookUpdateQuantity($params){return $this->hookRightColumn($params);}
	function hookSearch($params){return $this->hookRightColumn($params);}
	function hookExtraCarrier($params){return $this->hookRightColumn($params);}
	function hookProductActions($params){return $this->hookRightColumn($params);}
	
	
	
	
	function hookRightColumn($params)
	{
		if (file_exists(dirname(__FILE__).'/content.xml'))
		{
			if ($xml = simplexml_load_file(dirname(__FILE__).'/content.xml'))
			{
				global $cookie, $smarty;
				$lang = (isset($cookie->id_lang) && $cookie->id_lang !='')? $cookie->id_lang : '4';
				$smarty->assign(array(
					'content' => $xml->{'content_'.$lang}
				));
				return $this->display(__FILE__, 'wcontentmaker.tpl');
			}
		}
		return false;
	}

	function getContent()
	{
		$this->_html = '<h2>'.$this->displayName.'</h2>';
		if(isset($_POST['deleteImage']) && $_POST['deleteImage'] != ''){
			$tmp_file = strip_tags($_POST['deleteImage']);
			//echo dirname(__FILE__).'/imgs/'.$tmp_file;
			unlink(dirname(__FILE__).'/imgs/'.$tmp_file);
		}
		if (isset($_POST['submitUpdate']))
		{
			$forbidden = array('submitUpdate');
			$newXml = '<?xml version=\'1.0\' encoding=\'utf-8\' ?>'."\n";
			$newXml .= '<html>'."\n";
			foreach ($_POST AS $key => $field)
			{
				if (_PS_MAGIC_QUOTES_GPC_)
					$field = stripslashes($field);
				if ($line = $this->putContent($newXml, $key, $field, $forbidden, 'header'))
					$newXml .= $line;
			}
			$newXml .= "\n</html>\n";
			if ($fd = @fopen(dirname(__FILE__).'/content.xml', 'w'))
			{
				if (!@fwrite($fd, $newXml))
					$this->_html .= $this->_errorText(1);
				if (!@fclose($fd))
					$this->_html .= $this->_errorText(2);
			}
			else
				$this->_html .= $this->_errorText(3);
		}
			if (isset($_FILES['module_img']) AND isset($_FILES['module_img']['tmp_name']) AND !empty($_FILES['module_img']['tmp_name']))
			{
				Configuration::set('PS_IMAGE_GENERATION_METHOD', 1);
				if(file_exists(dirname(__FILE__)."/imgs/" . $_FILES["module_img"]["name"])){
					$tmp_name = explode('.',$_FILES["module_img"]["name"]);
					$tmp_ext = end($tmp_name);
					array_pop($tmp_name);
					$tmp_name = implode('.',$tmp_name);
					$tmp_new_img_name = dirname(__FILE__)."/imgs/".$tmp_name;
					
					$control_loop = false;
					$tmp_i = 1;
					while ($control_loop == false){
						if(file_exists($tmp_new_img_name.'('.$tmp_i.').'.$tmp_ext )){
							++ $tmp_i;
						}else{ 
							$_FILES["module_img"]["name"] = $tmp_name.'('.$tmp_i.').'.$tmp_ext; 
							$control_loop = true;
						}
					}
				}
				
				if ($error = checkImage($_FILES['module_img'], $this->maxImageSize))
					$this->_html= $error;
				elseif (!imageResize($_FILES['module_img']['tmp_name'], dirname(__FILE__).'/imgs/'.$_FILES["module_img"]["name"]))
					$this->_html .= $this->_errorText(4);
			}
		$this->_displayForm();

		return $this->_html;
	}
	
	private function _errorText($error=0){
		$result = '';
		switch($error){
			case 1 :{ $result = 'Unable to save contents.';}; break;
			case 2 :{ $result = 'Problem saving the contents.';}; break;
			case 3 :{ $result = 'Unable to handle file.<br />Please check the text ".xls" file\'s writing permissions.';}; break;
			case 4 :{ $result = 'An error occurred during the image upload.';}; break;
			default:{}; break;
		}
		return $this->displayError($this->l($result));
	
	}
	private function _displayForm()
	{
		global $cookie;
		/* Languages preliminaries */
		$defaultLanguage = intval(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages();
		$iso = Language::getIsoById($defaultLanguage);
		$divLangName = 'module_content';

		/* xml loading */
		$xml = false;
		if (file_exists(dirname(__FILE__).'/content.xml'))
				if (!$xml = @simplexml_load_file(dirname(__FILE__).'/content.xml'))
					$this->_html .= $this->displayError($this->l('Your text file is empty.'));

		$this->_html .= '<br />
		<form method="post" action="'.$_SERVER['REQUEST_URI'].'" enctype="multipart/form-data">
			<fieldset>
				<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->displayName.'</legend>
				<div id="stop-using-ie"></div>
				<label>'.$this->l('Module\'s Content').'</label>
				<div class="margin-form">';
			foreach ($languages as $language)
				{
					$this->_html .= '
					<div id="module_content_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;">
						<textarea cols="100" rows="30" id="right_'.$language['id_lang'].'" name="content_'.$language['id_lang'].'">'.($xml ? stripslashes(htmlspecialchars($xml->{'content_'.$language['id_lang']})) : '').'</textarea>
					</div>';
				 }

				$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'module_content', true);
				$this->_html .= '
				</div><div class="clear pspace"></div>
				<label>'.$this->l('Module\'s Images').'</label>
				<div class="margin-form">
				';
				///////////
				$this->_html .= $this->getImages();
				///////////
				$this->_html .= '
				</div>
				<div class="clear pspace"></div>
				
				<label>'.$this->l('Image Upload').'</label>
				<div class="margin-form">
					<input type="file" name="module_img" />
				</div>
				<div class="clear pspace"></div>
				<div class="margin-form clear"><input type="submit" name="submitUpdate" value="'.$this->l('Update ( Save )').'" class="button" /></div>
			</fieldset>
		</form>
		<form method="post" action="'.$_SERVER['REQUEST_URI'].'" id="deleteForm">
			<input type="hidden" name="deleteImage" id="deleteImage" value="">
		</form>
		<script>
		$(".imgUrl").click(function(){
			var path_var = "'.$this->_path.'";
			var img = $(this).parent().attr("rel");
			prompt("Image Url",path_var+img);
		});
		$(".imgDelete").click(function(){
			var img = $(this).parent().attr("rel").replace("imgs/","");
			$("#deleteImage").val(img);
			var answer = confirm ("'.$this->l('Do you really want to delete this file?').'");
			if (answer){$("#deleteForm").submit()}
		});
		</script>
			<script type="text/javascript" src="../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
			<script language="javascript" type="text/javascript">
				tinyMCE.init({
					language : "';
		$iso = Language::getIsoById(intval($cookie->id_lang));
		$this->_html .= ((!file_exists(PS_ADMIN_DIR.'/../js/tinymce/jscripts/tiny_mce/langs/'.$iso.'.js')) ? 'en' : $iso).'",
					mode : "textareas",
					elements : "nourlconvert",
					convert_urls : false,
					theme : "advanced",
					theme_advanced_buttons1 : "bold, italic, underline, fontselect, fontsizeselect",
					theme_advanced_buttons2 : "forecolor, backcolor, separator, justifyleft, justifycenter, justifyright, justifyfull, separator, bullist, numlist, separator, undo, redo, separator, link, unlink, separator, code",
					theme_advanced_buttons3 : "",
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					plugins : "safari,pagebreak,style,layer,table,advimage,inlinepopups,preview,media,searchreplace,,paste,directionality,fullscreen",
					theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
					theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,forecolor,backcolor|,styleprops",
					theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
					theme_advanced_buttons4 : "link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,insertlayer,moveforward,movebackward,absolute,|,pagebreak,",
					paste_create_paragraphs : false,
					paste_create_linebreaks : false,
					paste_use_dialog : true,
					paste_auto_cleanup_on_paste : true,
					paste_convert_middot_lists : false,
					paste_unindented_list_class : "unindentedList",
					paste_convert_headers_to_strong : true,
					paste_insert_word_content_callback : "convertWord",
					width: "632",
					height: "400",
					extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
				});
				function convertWord(type, content)
				{
					switch (type)
					{
						case "before":
							break;
						case "after":
							break;
					}
					return content;
				}
		</script>
		<script language="javascript">id_language = Number('.$defaultLanguage.');</script>
		<script type="text/javascript" src="http://www.stopusingie.com/stopusingie.js"></script>
		 
		<script type="text/javascript">
		$(document).ready(function() {
			stopUsingIE({ "color": "black", "method": "inline", "forceClose": true, "onlyOld": true, "divID": "stop-using-ie" });
		});	
		</script>
		';
		

	}
	private function getImages(){
		$tmp_files_info = array();
		$result = '<div>';

		$handle = opendir(_PS_MODULE_DIR_.basename(dirname(__FILE__)).'/imgs/');
		
		while (false !== ($file = readdir($handle))) {
			$tmp_files_info[$file]= $file;
		}
		closedir($handle);
		unset($tmp_files_info['..'],$tmp_files_info['.']);
		asort($tmp_files_info);
		
		$tmp_i = 0;
		foreach($tmp_files_info as $image){
			$tmp_line_extra = ($tmp_i >= 3)? '</div><div style="clear:both;"></div><div>':'';
			
			$result .='<div class="imgContainer" style="" rel="imgs/'.$image.'">
			<div class="imgUrl"><img src="'.$this->_path.'url.png" alt="URL"/></div>
			<div class="imgDelete"><img src="'.$this->_path.'close.png" alt="DELETE"/></div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:90px;" valign="middle">
				<img src="'.$this->_path.'imgs/'.$image.'" style="max-width:100px; max-height:100px" />
				</td>
			  </tr>
			</table>
			<div class="imgName">'.$image.'</div></div>'.$tmp_line_extra; 
			$tmp_i =($tmp_line_extra != '')? 0:++ $tmp_i;
		}
		
		$result .= '<div style="clear:both;"></div></div>';
		$result .= '
		<style>
			.imgContainer{float:left; width:150px; min-height:100px; border:solid 1px #000; text-align:center; position:relative; background-color:#FFF; margin:3px; display:block;vertical-align: middle;}
			.imgUrl{position:absolute; top:0px; left:0px; width:22px; cursor:pointer;}
			.imgDelete{position:absolute; top:0px; right:0px; width:22px; cursor:pointer;}
			.imgName{position:absolute; width:100%; bottom:0px; background-color:#000; color:#FFF;}
		</style>
		';
		return $result;
	}
	
	function putContent($xml_data, $key, $field, $forbidden)
	{
		foreach ($forbidden AS $line)
			if ($key == $line)
				return 0;
		$field = htmlspecialchars($field);
		if (!$field)
			return 0;
		return ("\n".'		<'.$key.'>'.$field.'</'.$key.'>');
	}

}
?>
