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
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="/dados-bancarios/create" method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label for="txtBanco" class="form-label">Banco</label>
                        <input type="text" class="form-control" id="txtBanco" name="banco" require>
                    </div>
                    <div class="col-md-4">
                        <label for="txtAgencia" class="form-label">Agencia</label>
                        <input type="text" class="form-control" id="txtAgencia" name="agencia" require>
                    </div>
                    <div class="col-md-4">
                        <label for="txtConta" class="form-label">Conta</label>
                        <input type="text" class="form-control" id="txtConta" name="conta" require>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-secondary">Gravar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead class="c-cinza-alpha">
                        <th width="50%">Banco</th>
                        <th width="20%">Agencia</th>
                        <th width="20%">Conta</th>
                        <th width="10%">#</th>
                    </thead>
                    <tbody>
                        <?php foreach ($dadosBancarios as $db) : ?>
                            <tr>
                                <td><?= $db->banco ?></td>
                                <td><?= $db->agencia ?></td>
                                <td><?= $db->conta ?></td>
                                <td class="text-center">
                                    <?= anchor("/dados-bancarios/remove/$db->idDadoBancario", "remover", ["class" => "btn btn-outline-danger btn-sm", "onclick" => "return db.confirma()"]) ?>
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
    var db = {
        confirma: () => {
            if(confirm("Confirma a remoção?")) return true;
            return false;
        }
    }
</script>

<?= $this->endSection() ?>