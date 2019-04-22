<?php 


class Loterias {
	

	public function getLoteria() {

		$COOKIE_NAME = 'cookie.txt';
        unlink($COOKIE_NAME);

        $result = "nada";
        try {
            $URL = 'http://loterias.caixa.gov.br/wps/portal/loterias/landing/lotofacil/!ut/p/a1/04_Sj9CPykssy0xPLMnMz0vMAfGjzOLNDH0MPAzcDbz8vTxNDRy9_Y2NQ13CDA0sTIEKIoEKnN0dPUzMfQwMDEwsjAw8XZw8XMwtfQ0MPM2I02-AAzgaENIfrh-FqsQ9wBmoxN_FydLAGAgNTKEK8DkRrACPGwpyQyMMMj0VAcySpRM!/dl5/d5/L2dBISEvZ0FBIS9nQSEh/pw/Z7_61L0H0G0J0VSC0AC4GLFAD2003/res/id=buscaResultado/c=cacheLevelPage/=/?timestampAjax=1555947338128';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_TIMEOUT, 35);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIE_NAME);

            $store = curl_exec($ch);
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_ENCODING, "");
            curl_setopt($ch, CURLOPT_TIMEOUT, 35);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            $result = curl_exec($ch);
            curl_close($ch);

            if (mb_check_encoding($result, "ISO-8859-1"))
                $result = iconv("ISO-8859-1", "UTF-8", $result);
        } catch (Exception $e) {
            $result['error'] = 'Caught exception: ' . $e->getMessage();
        }
        return $result;

	}

}