<?= $this->extend("layout/_layout") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title">
                <h3 class="page-title">Controle Lançamento</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 text-center">
        <?php echo \Config\Services::validation()->listErrors("c_list") ?>
        <?php if(isset($mensagem)) echo '<div class="alert alert-danger" role="alert">' . $mensagem . "</div>" ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/controle/create" method="POST" class="row g-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="txtData" class="form-label">Data</label>
                        <input type="date" class="form-control" id="txtData" name="data" require>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="txtValor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="txtValor" name="valor" onkeyup="cn.valorMask()" maxlength="9" require>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="txtTipo" class="form-label">Tipo de Gasto</label>
                        <?= form_dropdown("tipo", $optionsTipo, null, ["class" => "form-select"]) ?>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="forma" class="form-label">Forma de Pagamento</label>
                        <?= form_dropdown("forma", $optionsFormaPagamento, null, ["class" => "form-select"]) ?>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="txtDescricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="txtDescricao" name="descricao" require>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="txtDescricao" class="form-label">Parcelado</label>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="1" id="parcelado" name="parcelado" onclick="cn.ativoParcelado()">
                            </div>
                            <input type="number" class="form-control" id="numeroParcelas" name="numeroParcelas" aria-label="Text input with checkbox" disabled>
                        </div>
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
    var cn = {
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
        },

        ativoParcelado: () => {
            var ckb = document.getElementById("parcelado");
            document.getElementById("numeroParcelas").disabled = !ckb.checked;
        }
    }
</script>

<?= $this->endSection() ?>