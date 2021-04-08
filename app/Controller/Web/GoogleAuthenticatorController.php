<?php


namespace App\Controller\Web;

use Agp\TwoFactor\GoogleAuthentication;
use PragmaRX\Google2FA\Google2FA;

class GoogleAuthenticatorController
{
    public function index()
    {
        return view('google-authenticator.index');
    }

    public function show()
    {
        $googleAuthenticator = (object) (new GoogleAuthentication())->get(auth()->user());
        return view('google-authenticator.show', ["googleAuthenticator" => $googleAuthenticator->data]);
    }

    public function verify()
    {
        $valid = (object) (new GoogleAuthentication())->verify(auth()->user(), request()->get('secret'));
        return redirect()->route('web.google-authenticator.show', ["google_authenticator" => auth()->user()->getKey()])
            ->with('success', 'Autorizado');
    }

    public function create()
    {
        $secretKey = (new GoogleAuthentication())->create(auth()->user());
        if ($secretKey)
            return redirect()->route('web.google-authenticator.show', ['google_authenticator' => auth()->user()->getKey()]);

        return redirect()->route('web.google-authenticator.index')->with('error', 'Não foi possivel criar sua chave!');

        /*$secretKey = "VV4S5AB5L2ZOE5NRD57TAUJDOHSQF2CGTOJT2L2MIL4J3TMUYCHQDH7NERWI2RZF";
        $qrCodeUrl = (new Google2FA())->getQRCodeUrl(
            'AGP',
            'richardpcardos@gmail.com',
            $secretKey
        );

        // Cria QR Code
        echo "<img src='".(new \chillerlan\QRCode\QRCode)->render($qrCodeUrl)."'>";

        // Valida token
        $secret = "629013";
        $valid = (new Google2FA())->verifyKey($secretKey, $secret, 0);

        dd($secretKey, $qrCodeUrl, $valid);*/
    }

    public function destroy()
    {
        (new GoogleAuthentication())->destroy(auth()->user(), request()->get('secret'));
        return redirect()->route('web.google-authenticator.index')->with('warning', 'Desativado com sucesso!');
    }

}
