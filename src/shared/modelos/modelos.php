<?php 

include './../../Database/config.php';

$pdo = new Connect;
$res = $pdo->prepare("SELECT * FROM veiculo");
$res->execute();
$veiculos = $res->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="text-main">Modelos</div>

<div class="back-modelo">
    <div class="row">
        <?php foreach ($veiculos as $veiculo) { ?>
            <div class="card card-size col-md-3">
                <img src="assets/veiculos/mustang.jpg" class="card-img-top img-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mustang</h5>
                    <h6 class="card-subtitle mb-2 text-muted">R$ 396,900</h6>
                    <p class="card-text">Novo design e detalhes exclusivos. Conheça o Novo Mustang Black Shadow! Confira as novidades da Edição Especial de 55 anos do Ícone do mundo.</p>
                </div>
            </div>
        <?php } ?>  
    </div>
</div>

