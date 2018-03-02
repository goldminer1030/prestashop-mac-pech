<!--module manufacturerLogo--->				
				{*hook h="DisplayILabsManufacturerLogo" product=$products type=product*}
				{assign var=logos  value=(int)Configuration::get('manufacturerlogo_name')}
				{if isset($logos) && $logos==1}
                {Manufacturer::getNameById($product.id_manufacturer)}
                {/if}				
				<a href="{$base_dir}index.php?id_manufacturer={$product.id_manufacturer}&controller=manufacturer&id_lang={Tools::getValue('id_lang')}">
                <img src="{$base_dir}img/m/{$product.id_manufacturer}-small_default.jpg" alt="{Manufacturer::getNameById($product.id_manufacturer)}" title="{Manufacturer::getNameById($product.id_manufacturer)}">
                </a>				
<!--end module--->