<?= $this->extend("layout/_layout") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title">
                <h3 class="page-title">Dados Bancários</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 text-center">
        <?php echo \Config\Services::validation()->listErrors("c_list") ?>
        <?php if(isset($mensagemErro)) echo '<div class="alert alert-danger" role="alert">' . $mensagemErro . "</div>" ?>
        <?php if(isset($mensagemSuccess)) echo '<div class="alert alert-success" role="alert">' . $mensagemSuccess . "</div>" ?>
    </div>
</div>

<div class="row">
    <div class="col-1">
        <?= anchor("/entrada/novo", "+", ["class" => "btn btn-outline-primary rounded-circle"]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead class="c-cinza-alpha">
                        <th width="50%">Data</th>
                        <th width="20%">Valor</th>
                        <th width="10%">#</th>
                    </thead>
                    <tbody>
                        <?php foreach ($entradas as $db) : ?>
                            <tr>
                                <td><?= date("d/m/Y", strtotime($db->dataEntrada)) ?></td>
                                <td><?= number_format($db->valor, 2, ',', '.') ?></td>
                                <td class="text-center">
                                    <?= anchor("/entrada/remove/$db->idEntrada", "remover", ["class" => "btn btn-outline-danger btn-sm", "onclick" => "return entrada.confirma()"]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var entrada = {
        confirma: () => {
            if(confirm("Confirma a remoção?")) return true;
            return false;
        }
    }
</script>

<?= $this->endSection() ?>