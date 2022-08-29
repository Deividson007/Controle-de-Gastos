<?= $this->extend("layout/_layout") ?>
<?= $this->section("content") ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title">
                <h3 class="page-title">Formas de Pagamento</h3>
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
                <form action="/forma-pagamento/create" method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label for="txtDescricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="txtDescricao" name="descricao" require>
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
                        <th width="90%">Descrição</th>
                        <th width="10%">#</th>
                    </thead>
                    <tbody>
                        <?php foreach ($formaPagamento as $fp) : ?>
                            <tr>
                                <td><?= $fp->descricao ?></td>
                                <td class="text-center">
                                    <?= anchor("/tipo-gasto/remove/$fp->idFormaPagamento", "remover", ["class" => "btn btn-outline-danger btn-sm", "onclick" => "return db.confirma()"]) ?>
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