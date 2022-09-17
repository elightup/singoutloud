<?php

class SingOutLoud_Icons
{

	public static function get_icons()
	{
		return apply_filters('estar_icons', [
			'chevron-up'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"></polyline></svg>',
			'email'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>',
			'phone'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>',
			'chevron-down'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"></polyline></svg>',
			'chevron-left'  => '<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
			'chevron-right' => '<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>',
			'menu'          => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>',
			'search'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
			'shopping-bag'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>',
			'time'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z"></path><path d="M13 7L11 7 11 13 17 13 17 11 13 11z"></path></svg>',
			'user'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h1 1 14H20z"></path></svg>',
			'play'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 6L7 18 17 12z"></path></svg>',
			'arrow-next'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.4 12.9h10v2.6c0 .4.1.4.3.2l3.3-3.3c.3-.2.3-.6 0-.8l-3.3-3.3c-.2-.2-.4-.2-.4.2V11H5.4c-.3 0-.6.3-.6.6v.6c0 .3.3.6.6.6zm0 0"/></svg>',
			'reply'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 440l-28.1-32.1c-22.5-25.7-43.3-45.5-72.1-58.7-26.6-12.3-60-18.7-104.3-19.8V432L48 252 259.5 72v103.2c73 3 127.2 27 161.6 71.8 28.5 37 42.9 88.2 42.9 152.3z"/></svg>',
			'preserve'      => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="200" width="200" fill="#ffffff" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g><path d="M89.417,36.305c0.18-1.034-0.144-2.146-0.953-2.877l-11.045-9.943c-1.193-1.071-3.198-1.139-4.459-0.146l-1.392,1.098   l0.55-7.6c0.116-1.6-1.102-2.907-2.705-2.907h-4.241V7.292C65.172,3.281,61.892,0,57.88,0H17.819c-4.011,0-7.292,3.281-7.292,7.292   V92.71c0,4.009,3.281,7.29,7.292,7.29H57.88c4.012,0,7.292-3.281,7.292-7.29V70.482h0.241c1.604,0,2.915-1.312,2.915-2.916v-1.449   c1.66,0.897,3.29,2.75,3.75,6.534c0.553,4.566-0.074,8.193-0.579,11.107c-0.301,1.734-0.56,3.231-0.56,4.679   c0,6.78,4.317,10.439,8.38,10.439c2.228,0,4.346-1.059,5.812-2.9c1.49-1.877,2.278-4.481,2.278-7.539   c0-5.536-0.67-10.292-1.318-14.894c-0.787-5.587-1.537-10.905-1.138-17.48c1.454-0.025,2.705-1.127,2.854-2.608l1.653-16.373   C89.488,36.812,89.464,36.554,89.417,36.305z M27.008,35.317c-1.512,0-2.738-1.227-2.738-2.737c0-1.515,1.227-2.738,2.738-2.738   c1.513,0,2.738,1.224,2.738,2.738C29.746,34.091,28.521,35.317,27.008,35.317z M37.851,35.317c-1.511,0-2.737-1.227-2.737-2.737   c0-1.515,1.227-2.738,2.737-2.738c1.514,0,2.739,1.224,2.739,2.738C40.59,34.091,39.364,35.317,37.851,35.317z M48.694,35.317   c-1.512,0-2.737-1.227-2.737-2.737c0-1.515,1.226-2.738,2.737-2.738c1.513,0,2.739,1.224,2.739,2.738   C51.434,34.091,50.207,35.317,48.694,35.317z M59.258,19.937c0,1.604-1.313,2.916-2.917,2.916H19.359   c-1.604,0-2.916-1.312-2.916-2.916v-9.825c0-1.604,1.312-2.916,2.916-2.916h36.981c1.604,0,2.917,1.312,2.917,2.916V19.937z    M81.167,92.824c-1.734,2.182-5.164,0.629-5.164-4.387c0-1.012,0.226-2.311,0.485-3.813c0.531-3.07,1.259-7.277,0.616-12.583   c-0.829-6.815-4.753-10.178-8.776-11.322v-1.161c0-1.604-1.312-2.916-2.915-2.916h-0.241v-13.07h2.096   c1.604,0,3.011-1.308,3.127-2.907l0.331-4.587l7.198,3.511l-0.065,12.875c-0.008,1.316,0.871,2.512,2.067,2.993   c-0.468,7.242,0.35,13.108,1.15,18.797c0.653,4.629,1.27,9.003,1.27,14.185C82.346,90.31,81.927,91.868,81.167,92.824z"></path></g></svg>',
		]);
	}

	public static function render($name, $class = '', $display = true)
	{
		$icons = self::get_icons();
		$icon  = $icons[$name] ?? null;
		$class = $class ? "icon $class" : 'icon';
		$icon  = str_replace('<svg', '<svg class="' . $class . '"', $icon);
		if ($display) {
			echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		return $icon;
	}
}
