<?php 
	
	$link = sha1('home_pe');
	if (isset($_GET[sha1('home_pe')])) {
		
		header("location:home_pe.php?$link");
    }

    elseif (isset($_GET[sha1('p_tagih_tampil')])) {
		
		header("location:pelanggan/tagih/tagih_tampil.php$link");
    }

    elseif (isset($_GET[sha1('p_lunas_tampil')])) {
		
		header("location:pelanggan/tagih/lunas_tampil.php$link");
	}
 ?>