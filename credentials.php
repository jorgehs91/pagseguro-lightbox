<?php 

require_once "vendor/autoload.php";

try {
    \PagSeguro\Library::initialize();
} catch (Exception $e) {
    die($e);
}
\PagSeguro\Library::cmsVersion()->setName('Nome')->setRelease('1.0.0');
\PagSeguro\Library::moduleVersion()->setName('Nome')->setRelease('1.0.0');

/*
 * To do a dynamic configuration of the library credentials you have to use the set methods
 * from the static class \PagSeguro\Configuration\Configure. 
 */

/**
 *
 * @see https://sandbox.pagseguro.uol.com.br/#rmcl
 *
 * @var string $environment
 * @options=['production', 'sandbox']
 */
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');//production or sandbox

\PagSeguro\Configuration\Configure::setAccountCredentials(
    /**
     * @see https://devpagseguro.readme.io/v1/docs/autenticacao#section-obtendo-suas-credenciais-de-conta
     *
     * @var string $accountEmail
     */
    'jorg.jhs@gmail.com',
    /**
     * @see https://devpagseguro.readme.io/v1/docs/autenticacao#section-obtendo-suas-credenciais-de-conta
     *
     * @var string $accountToken
     */
    'EE8A0897DAF94381AA08698BDDDFC71A'
);

/**
 *
 * @see https://devpagseguro.readme.io/docs/endpoints-da-api#section-formato-de-dados-para-envio-e-resposta
 *
 * @var string $charset
 * @options=['UTF-8', 'ISO-8859-1']
 */
\PagSeguro\Configuration\Configure::setCharset('UTF-8');

/**
 * Path do arquivo de log, tenha certeza de que o php terá permissão para escrever no arquivo
 *
 * @var string $logPath
 */
\PagSeguro\Configuration\Configure::setLog(true, '/log');

try {
    $response = \PagSeguro\Services\Session::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    echo "deu bom";
} catch (Exception $e) {
    die($e->getMessage());
}