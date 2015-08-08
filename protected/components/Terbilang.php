<?php
class Terbilang
{
	function satuan($number)
	{
		switch ($number)
		{
			case 1 : return 'satu ';
			case 2 : return 'dua ';
			case 3 : return 'tiga ';
			case 4 : return 'empat ';
			case 5 : return 'lima ';
			case 6 : return 'enam ';
			case 7 : return 'tujuh ';
			case 8 : return 'delapan ';
			case 9 : return 'sembilan ';
			default : return '';
		}
	}

	function belasan($number)
	{
		if ($number == '11')
			return "sebelas ";
		else
			return satuan(substr($number,1,1))."belas ";
	}

	function puluhan($number)
	{
		if ($number == 1)
			return "sepuluh ";
		else if ($number == 0)
			return '';
		else
			return self::satuan($number)."puluh ";
	}

	function ratusan($number)
	{
		if ($number == 1)
			return "seratus ";
		else if ($number == 0)
			return '';
		else
			return self::satuan($number)."ratus ";
	}

	function ribuan($number)
	{
		if ($number == 1)
			return "seribu ";
		else if ($number == 0)
			return '';
		else
			return self::satuan($number)."ribu ";
	}

	function jutaan($number)
	{
		if ($number == 0)
			return '';
		else
			return self::satuan($number)."juta ";
	}

	function milyaran($number)
	{
		if ($number == 0)
			return '';
		else
			return self::satuan($number)."milyar ";
	}

	public static function write($rp)
	{
		$kata = "";
		$rp = trim($rp);
		if (strlen($rp) >= 10)
		{
			$angka = substr($rp, strlen($rp)-10, -9);
			$kata = $kata.self::milyaran($angka);
		}
		$tambahan = "";
		if (strlen($rp) >= 9)
		{
			$angka = substr($rp, strlen($rp)-9, -8);
			$kata = $kata.self::ratusan($angka);
			if ($angka > 0) { $tambahan = "juta "; }
		}
		if (strlen($rp) >= 8)
		{
			$angka = substr($rp, strlen($rp)-8, -7);
			$angka1 = substr($rp, strlen($rp)-7, -6);
			if (($angka == 1) && ($angka1 > 0))
			{
				$angka = substr($rp, strlen($rp)-8, -6);
				$kata = $kata.self::belasan($angka)."juta ";
			}
			else
			{
				$angka = substr($rp, strlen($rp)-8, -7);
				$kata = $kata.self::puluhan($angka);
				if ($angka > 0) { $tambahan = "juta "; }
				
				$angka = substr($rp, strlen($rp)-7, -6);
				$kata = $kata.self::ribuan($angka);
				if ($angka == 0) { $kata = $kata.$tambahan; }
			}	
		}
		if (strlen($rp) == 7)
		{
			$angka = substr($rp, strlen($rp)-7, -6);
			$kata = $kata.self::jutaan($angka);
			if ($angka == 0) { $kata = $kata.$tambahan; }
		}
		$tambahan = "";
		if (strlen($rp) >= 6)
		{
			$angka = substr($rp, strlen($rp)-6, -5);
			$kata = $kata.self::ratusan($angka);
			if ($angka > 0) { $tambahan = "ribu "; }
		}
		if (strlen($rp) >= 5)
		{
			$angka = substr($rp, strlen($rp)-5, -4);
			$angka1 = substr($rp, strlen($rp)-4, -3);
			if (($angka == 1) && ($angka1 > 0))
			{
				$angka = substr($rp, strlen($rp)-5, -3);
				$kata = $kata.self::belasan($angka)."ribu ";
			}
			else
			{
				$angka = substr($rp, strlen($rp)-5, -4);
				$kata = $kata.self::puluhan($angka);
				if ($angka > 0) { $tambahan = "ribu "; }
				
				$angka = substr($rp, strlen($rp)-4, -3);
				$kata = $kata.self::ribuan($angka);
				if ($angka == 0) { $kata = $kata.$tambahan; }
			}
		}
		if (strlen($rp) == 4)
		{
			$angka = substr($rp, strlen($rp)-4, -3);
			$kata = $kata.self::ribuan($angka);
			if ($angka == 0) { $kata = $kata.$tambahan; }
		}
		if (strlen($rp) >= 3)
		{
			$angka = substr($rp, strlen($rp)-3, -2);
			$kata = $kata.self::ratusan($angka);
		}
		if (strlen($rp) >= 2)
		{
			$angka = substr($rp, strlen($rp)-2, -1);
			$angka1 = substr($rp, strlen($rp)-1);
			if (($angka == 1) && ($angka1 > 0))
			{
				$angka = substr($rp, strlen($rp)-2);
				$kata = $kata.self::belasan($angka);
			}
			else
			{
				$kata = $kata.self::puluhan($angka);
				$angka = substr($rp, strlen($rp)-1);
				$kata = $kata.self::satuan($angka);
			}
		}
		if (strlen($rp) == 1)
		{
			$angka = substr($rp, strlen($rp)-1);
			$kata = $kata.self::satuan($angka);
		}
		return $kata;
	}
}