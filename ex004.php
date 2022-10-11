<?php 


function badFruit($badfruit, $survivorLife){
    return $survivorLife -= $badfruit;
}

function eatFood($fruitCure, $fruitQtd, $survivorLife){
    $cont = 0;
        while($survivorLife < 10){
            
            if($fruitQtd > 0 && $survivorLife < 10){
                $survivorLife += $fruitCure;
                $fruitQtd -= 1;
                $cont++;
                $soma = $fruitCure * $cont;
                if($fruitQtd > 0){
                    echo "Steve come {$cont} maçã recuperando {$fruitCure} de vida no total $soma<br>";
                }
                if($survivorLife >= 10){
                    $survivorLife = 10;
                    break;
                }
            } else if($fruitQtd == 0){
                echo "Acabou a comida.<br>";
                break;
            }
    
        }
        
        
        
       return [$survivorLife, $fruitQtd, $cont];
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

$armor = [
    "name" => "Armadura de Esqueleto",
    "life" => rand(3, 5)
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

$enemyTree = [
    "name" => "Pilagers",
    "life" => 8,
    "dmg" => rand(4, 6),
    "qtd" => rand(3, 4)
];

$food = [
    "name" => "maçãs",
    "cure" => rand(2, 4),
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
while($enemyLife >
 0){
    
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

while($enemyTwo['life'] > 0){
    
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

echo "Steve venceu o {$enemyTwo['name']}! E ao dar o golpe final, Steve recolheu o arco do seu inimigo (que não precisa de flecha para atirar pois é mágico) e uma armadura de esqueleto.";

echo "<br> Steve, após vencer seu inimigo, procurou em sua mochila se havia comida pra se recuperar, olhando dentro da mochila viu que
havia {$lifeAtual[1]} {$food['name']}.";

$lifeAtual = eatFood($food['cure'],$lifeAtual[1], $lifeAtual[0]);


echo "<br>Após comer, o herói está com {$lifeAtual[0]} de vida e {$lifeAtual[1]} {$food['name']}<br>";
$lifeAtual[0] += $armor['life'];
echo "<br>Agora Steve está utilizando a armadura e o arco, Agora ele possui {$lifeAtual[0]} de vida.<br>";

echo "<br>Mais a frente, Steve encontra uma vila, que está sendo atacada por {$enemyTree['qtd']} invasores.";

echo "<br>Steve pega o arco e começa a batalhar com os inimigo";

/* ============ Batlle ============== */

while($enemyTree['qtd'] > 0){
    echo "<br> ";
    line();
    echo "Steve possui {$lifeAtual[0]} de vida enquanto seu inimigo possui {$enemyTree['life']}!";
    echo "<br>";

    $lifeEnemy = $enemyTree['life'];
    while($enemyTree['life'] > 0 ){
        
        echo "<br>";
        $enemyTree['life'] -= $weaponTwo['dmg'];
        echo "O inimigo perdeu {$weaponTwo['dmg']} de vida.";
        echo "<br>";
        
        if($enemyTree['life'] > 0){
            $lifeAtual[0] -= $enemyTree['dmg'];
            echo "Steve perdeu {$enemyTree['dmg']} de vida.";
        }
        if( $lifeAtual[0] <= 0 && $enemyTree['life'] > 0){
            $lifeAtual[0] = 0;
            echo "<br>A vida de Steve chegou a 0, ele  pereceu perante seu inimigo.<br>";
            exit;
        }
        if($enemyTree['life'] <= 0){
            echo "<br>O inimigo pereceu.<br>";
            $enemyTree['qtd'] -= 1;
            $enemyTree['life'] = $lifeEnemy;
            $lifeAtual = eatFood($food['cure'],$lifeAtual[1], $lifeAtual[0]);
            break;
        }
        echo "<br>";
    }
}

line();

echo "Após eliminar os inimigos, Steve é recebido como herói pela vila e convdado para morar alí.";