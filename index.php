<?php
// Base de dados simulada do nosso estoque
$skus = ["COD-001", "COD-002", "COD-003","COD-004","COD-005"];
$produtos = ["Placa Mãe Asus", "Processador Intel i7","Memória RAM 16GB","SSD NVMe 1TB","Fonte Corsair 600W"];
$precos = [850,1950.90,320.50,450,380];
$quantidades = [15,0,32,8,0];

// Vetor secundário para as categorias da loja
$categorias = ["Hardware","Periféricos","Monitores","Cabos","Redes de Computadores"];
?>

<DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Sistema Dinâmico de Estoque PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    td {
        text-align: center;
    }
    th {
        text-align: center;
    }
   .linha-departamento{
    display:flex;
    justify-content:space-between;
   }
</style>

</head>
<body class="bg-dark text-white p-5">
    <div class="container mt-5">
        <h2 class="text-primary mb-4 text-center">Estoque Central - Gerenciamento Automatizado</h2>
        <hr>

        <table class="table table-bordered table-hover mt-4 shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>SKU</th>
                    <th>Nome do Produto</th>
                    <th>Preço (R$)</th>
                    <th>Estoque Atual</th>
                    <th>Ações</th>
                </tr>
            </thead>
<tbody>
    <?php
// Iniciamos o laço. A variável $i vai de 0 até 4(tamanho do vetor).
    for ($i = 0; $i < 5; $i++){
    ?>
    
    <tr>
        <td><strong><?php echo $skus[$i];?></strong></td>
        <td> <?php echo $produtos[$i]; ?></td>
        <td>R$ <?php echo number_format($precos[$i], 2,',','.'); ?></td>
        <td><?php if ($quantidades[$i] == 0){ ?>
        <span class="badge bg-danger">FALTA NO ESTOQUE</span> <?php
        } elseif($quantidades[$i] < 10){ ?>
        <span class="text-warning fw-bold"> <?php echo $quantidades[$i]; ?> un. (Baixo) </span> <?php
        } else { ?>
        <span class="text-success fw-bold"> <?php echo $quantidades[$i]; ?> un. </span> <?php } ?>
        </td>
        <td>
            <button class="btn btn-sm btn-warning">Editar</button>
        </td>
    </tr>
    <?php
    }
?>
</tbody>
</table>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Departamentos da loja
            </div>
        <ul class="list-group list-group-flush">
            <?php
// Lê o vetor inteiro. A cada volta, guarda o item na variável $departamento
        foreach ($categorias as $departamento) {
        ?>
        <li class="list group-item d-flex justify-content-betweenalign-items-center linha-departamento">
            <?php echo "$departamento  "; ?>
            <span class="badge bg-primary rounded-pill">Ver</span></li>
        <?php
        } // Fim do foreach
        ?>
        </ul>
    </div>
    </div>
</div>

