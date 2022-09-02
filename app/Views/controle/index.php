<?= $this->extend("layout/_layout") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title">
                <h3 class="page-title">Controle</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-1">
        <?= anchor("/controle/novo", "+", ["class" => "btn btn-outline-primary rounded-circle"]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tabela as $t) : ?>
                            <tr>
                                <td><?= date("d/m/Y", strtotime($t->data)) ?></td>
                                <td><?= $t->tipo ?></td>
                                <td><?= $t->descricao ?></td>
                                <td><?= number_format($t->valor, 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong><?= number_format($total["valor"], 2, ',', '.') ?></strong></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">

    </div>
</div>

<br>

<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
    const ctx = document.getElementById("myChart");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: "# of Votes",
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)"
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<?= $this->endSection() ?>