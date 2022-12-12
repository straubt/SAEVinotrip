<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class OffrirSejourMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Le code de séjour offert.
     *
     * @var string
     */
    public $codeSejour;

    /**
     * Le titre du séjour offert.
     *
     * @var string
     */
    public $titreSejour;

    /**
     * Crée une nouvelle instance de la classe Mailable.
     *
     * @param  string  $codeSejour
     * @param  string  $titreSejour
     * @return void
     */
    public function __construct(string $codeSejour, string $titreSejour)
    {
        $this->codeSejour = $codeSejour;
        $this->titreSejour = $titreSejour;
    }

    /**
     * Construit l'e-mail qui sera envoyé.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.offrir-sejour')
                    ->subject('Vous avez reçu un code de séjour');
    }
}
