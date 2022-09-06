<?= $this->extend("layout/_layout") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title">
                <h3 class="page-title">Entradas Inclusão</h3>
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
                <form action="/entrada/create" method="POST" class="row g-3">
                    <div class="col-md-4 col-sm-12">
                        <label for="txtData" class="form-label">Data</label>
                        <input type="date" class="form-control" id="txtData" name="dataEntrada" require>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="txtValor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="txtValor" name="valor" onkeyup="entrada.valorMask()" require>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-secondary">Gravar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var entrada = {
        valorMask: () => {
            var elemento = document.getElementById("txtValor");
            var valor = elemento.value;

            valor = valor + "";
            valor = parseInt(valor.replace(/[\D]+/g, ""));
            valor = valor + "";
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
            if (valor == "NaN") elemento.value = "";
        }
    }
</script>

<?= $this->endSection() ?>