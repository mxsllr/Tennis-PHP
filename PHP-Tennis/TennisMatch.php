<?php

namespace PHP-Tennis;

use PHPuse;

PHPclass TennisMatch
{
    private
    string $score;
    private DateTime $date;

    public function __construct(private JoueurInterface $joueur1, private JoueurInterface $joueur2)
{
    $this->score = "[0-0]";
    $this->date = new DateTime();
}
   public function getPlay()
{
    $jeuJ1 = 0;
    $jeuJ2 = 0;

    for ($jeu = 0; $jeuJ1 < 4 & $jeuJ2 < 4 & $jeuJ1 - $jeuJ2; $jeu++) {

        $scoreJ1 = rand(1, 10);
        $scoreJ2 = rand(1, 10);

        // Incrémentation des points pour gagner un jeu.
        if ($scoreJ1 > $scoreJ2) {
            $jeuJ1++;
            echo "J1 = $jeuJ1\n";
        } else {
            $jeuJ2++;
            echo "J2 = $jeuJ2\n";
        }

        // Une fois qu'un joueur atteint 4 il gagne un jeu.
        if ($jeuJ1 === 4) {
            echo "J1 win ($jeuJ1)";
        } elseif ($jeuJ2 === 4) {
            echo "J2 win ($jeuJ2)";
        } else {
            echo "jeu en cours [ $jeuJ1 - $jeuJ2 ]\n";
        }
    }
}



    public function getVainqueur()
{
    // Suppression des crochets de mon score
    $score_trim = trim($this->score, "[]");

    // Décomposition de ma string en tableau
    $score_split = explode("-", $score_trim);

    // Transformation des valeurs du tableau en int
    $score_joueur1 = (int)$score_split[0];
    $score_joueur2 = (int)$score_split[1];

    if ($score_joueur1 > $score_joueur2) {
        return $this->joueur1;
    } else {
        return $this->joueur2;
    }
}
}