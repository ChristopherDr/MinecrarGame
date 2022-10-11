<?php 


function badFruit($badfruit, $survivorLife){
    return $survivorLife -= $badfruit;
}

function eatFood($fruitCure, $fruitQtd, $survivorLife){
    if($fruitQtd == 0){
        echo "Não Há mais comida para se fortalecer.";
        break;
    }
        while($survivorLife < 10){

            if($fruitQtd > 0 && $survivorLife < 10){
                $survivorLife += $fruitCure;
                $fruitQtd -= 1;
                
                if($survivorLife >= 10){
                    $survivorLife = 10;
                    break;
                }
            } else if($fruitQtd == 0){
                echo "Acabou a comida.";
                break;
            }
        }
       return [$survivorLife, $fruitQtd];
}


function line(){
    $line = "";
    for($i=150; $i > 0; $i--){
        $line .= "=";
    
    }
    echo "$line</br>";
}

function enemyLost(){
    echo "O inimigo pereceu!";
}

function survLost(){
    echo "Steve perdeu a vida na batalha!";
}


$survivor = [
    "name" => "Steve",
    "life" => 10,
    //"hungry" => 10
];

$weapon = [ 
    "name" => "stick",
    "dmg" => rand(1, 3)
];

$weaponTwo = [
    "name" => "arco",
    "dmg" => rand(5, 7)
];

$badFruits = [
    "name" => "baga",
    "dmg" => rand(1, 2)
];

$enemyOne = [
    "name" => "Zombie",
    "life" => 4,
    "dmg" => rand(1, 2)
];

$enemyTwo = [
    "name" => "esqueleto",
    "life" => 6,
    "dmg" => rand(3, 4)
];

$food = [
    "name" => "maçãs",
    "cure" => rand(1, 3),
    "qtd" => rand(7, 10)
];

$baga = badFruit($badFruits['dmg'], $survivor['life']);



$enemyLife = $enemyOne['life'];
$enemyDmg = $enemyOne['dmg'];
$weaponDmg = $weapon['dmg'];
$survivorLife = $baga;

$apple = eatFood($food['cure'], $food['qtd'], $survivorLife);
$vidaAtual = $apple[0];

/* ======================================== */


echo "Com um barulho ensurdecedor, o herói acorda sem saber onde está.
 Ele abre os olhos e verifica o local, parece uma floresta, com arvores baixas e algumas frutas no chão.</br>
 Ao se aproximar das frutas no chão, ela o machuca <strong> retirando {$badFruits['dmg']}</strong>
 de vida ficando com <strong> {$baga} de vida</strong>.<br>
 Steve vai embora atrás de {$food['name']} nas arvores, ao comer as frutas, ele se sente revigorado ficando com <strong>{$apple[0]}
 de vida e possui {$apple[1]} maças</strong>.";


echo "Sem menos perceber, Steve estava na floresta, escura, e ouvindo barulhos se aproximando. Rapidamente 
procura algo para se defender , a unica coisa que havia era um {$weapon['name']} de arvore, ao pega-lo
o barulho se aproxima e Steve está pronto para o ataque. No meio da escuridão, aparece um ZUMBI, que parte para cima de Steve.";

/* ============ Batlle ============== */

echo "<br>";
line();
echo "Steve possui {$apple[0]} de vida enquanto seu inimigo possui {$enemyLife}!";
echo "<br>";
while($enemyLife != 0){
    
    echo "<br>";
    $enemyLife -= $weaponDmg;
    echo "O inimigo perdeu {$weaponDmg} de vida.";
    echo "<br>";
    $apple[0] -= $enemyDmg;
    echo "Steve perdeu {$enemyDmg} de vida.";
    
    
    if($enemyLife <= 0){
        echo "<br>O inimigo pereceu.<br>";
        break;

    } else if($apple[0] <= 0){
        echo "Steve pereceu perante seu inimigo.<br>";
        break;
    }
    
    echo "<br>";
}
line();

/* ============ Batlle ============== */

echo "Steve, após vencer seu inimigo, procurou em sua mochila se havia comida pra se recuperar, olhando dentro da mochila viu que
havia {$apple[1]} {$food['name']}.";

$lifeAtual = eatFood($food['cure'],$apple[1], $apple[0]);
echo "<br>Após comer, o herói está com {$lifeAtual[0]} de vida e {$lifeAtual[1]} {$food['name']}<br>";

echo "Steve ja estava bem novamente, então ele parte para procurar um abrigo para passar a noite.<br>
Mais a frente, ele visualiza uma arvore que possui um buraco onde ele poderia passar a noite, 
porem entre ele e a arvore está um {$enemyTwo['name']} que viu Steve e começou a atirar flechas nele. Com isso Steve pegou uma pedra e jogou nele, tonteando o esqueleto e partindo para cima dele.
";

/* ============ Batlle ============== */

echo "<br>";
line();
echo "Steve possui {$lifeAtual[0]} de vida enquanto seu inimigo possui {$enemyTwo['life']}!";
echo "<br>";

while($enemyTwo['life'] != 0){
    
    echo "<br>";
    $enemyTwo['life'] -= $weaponDmg;
    echo "O inimigo perdeu {$weaponDmg} de vida.";
    echo "<br>";
    $lifeAtual[0] -= $enemyTwo['dmg'];
    echo "Steve perdeu {$enemyTwo['dmg']} de vida.";

    if($enemyTwo['life'] <= 0){
        echo "<br>O inimigo pereceu.<br>";
        break;
    } else if( $lifeAtual[0] <= 0){
        echo "Steve pereceu perante seu inimigo.<br>";
        exit;
    }
    echo "<br>";
}
line();

/* ============ Batlle ============== */

echo "Steve venceu o {$enemyTwo['name']}! E ao dar o golpe final, Steve recolheu o arco do seu inimigo que não precisava de flecha para atirar.";

echo "<br> Steve, após vencer seu inimigo, procurou em sua mochila se havia comida pra se recuperar, olhando dentro da mochila viu que
havia {$lifeAtual[1]} {$food['name']}.";

$lifeAtual = eatFood($food['cure'],$lifeAtual[1], $lifeAtual[0]);

echo "<br>Após comer, o herói está com {$lifeAtual[0]} de vida e {$lifeAtual[1]} {$food['name']}<br>";

echo "<br>Steve agora entra na arvore e consegue passar a noite sem mais problemas.<br>";

