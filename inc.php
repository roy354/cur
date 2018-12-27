<?php
class bot
{
	var $hasil;
	var $head; 
	var $url;
	var $data;
	var $ua;
	var $c_simpan;
	var $c_guna;
	var $header;
	var $ikuti;
	function __construct()
	{
		$this->ua = null;
		$this->ikuti = 0;
	}
	function send()
	{
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_URL, $this->url);
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->ikuti);
		 if (!empty($this->head)) 
		 {
		 	curl_setopt($ch, CURLOPT_HTTPHEADER, $this->head);
		 }
		 
		 if (!empty($this->data)) 
		 {
		 	curl_setopt($ch, CURLOPT_POST, 1);
		 	curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
		 }
		 if (!empty($this->dari)) {
		 	curl_setopt($ch, CURLOPT_REFERER, $this->dari);
		 }
		 curl_setopt($ch, CURLOPT_USERAGENT, $this->ua);
		 if (!empty($this->c_simpan)) 
		 {
		 	curl_setopt($ch, CURLOPT_COOKIEJAR, $this->c_simpan);
		 } 
		 if (!empty($this->c_guna)) 
		 {
		 	curl_setopt($ch, CURLOPT_COOKIEFILE, $this->c_guna);
		 }
		 
		 curl_setopt($ch, CURLOPT_HEADER, $this->header);
		
			
		 $this->hasil = curl_exec($ch);
		if (curl_errno($ch)) 
		{ 
		 	//echo 'Error:' . curl_error($ch); 
			$this->hasil = curl_error($ch);
		}
		else
		{
			$this->hasil = curl_exec($ch);	
		}
		 curl_close($ch);
		
	}
	function tampil()
	{
		echo $this->hasil;
	}
	
}
?>