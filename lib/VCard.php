<?php

class VCard
{
	static function make($name, $mobile)
	{
		$data = self::templete($name, $mobile);
		$file = __DIR__ . '/../resources/vcard.vcf';
		file_put_contents($file, $data, FILE_APPEND);
	}

	static function templete($name, $mobile) 
	{
		return "BEGIN:VCARD\nVERSION:3.0\nREV:2020-09-29T09:12:55Z\nN;CHARSET=utf-8:$name\nFN;CHARSET=utf-8:$name\nTEL;PREF;WORK:$mobile\nEND:VCARD\n";
	}
}