<?php
/**
 * @author: Mayck Xavier <mayckxavier@lab01.com.br>
 */
?>

<div id="workspace">
    <div class="workspace-title">
        <?php echo img('assets/img/workspace-img.png') ?>
    </div>

    <div class="workspace-clientes">
        <div class="label_titulo">
            <?php echo img(array('src' => 'assets/img/title-clientes.png')) ?>
        </div>
        <div>
            <table>
                <tr>
                    <td colspan="2">
                        <p style="margin-top: 50px;border-bottom: 1px solid white;width: 800px">
                            Inclusão de Cliente
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 550px">
                        <?php echo form_open('clientes/do_create') ?>
                        <label for="">Nome Completo:</label> <br/>
                        <input type="text" name="nome" value="<?php echo set_value('nome') ?>"
                               class="roundedInput requiredInput"/> <br/> <br>

                        <label for="">Tipo do Documento:</label> <br>
                        <?php echo form_dropdown('tipo_documento',
                            array(
                                '' => 'Selecione',
                                'cpf' => 'CPF',
                                'CNPJ' => 'CNPJ'
                            ),
                            set_value('tipo_documento'), 'name="tipo_documento" id="tipo_documento" class="roundedInput"
                               style="width: 200px"');
                        ?> <br><br/>

                        <label for="">Número do Documento:</label> <br/>
                        <input type="text" name="numero_documento" id="numero_documento" class="roundedInput cnpj"
                               style="width: 200px" value="<?php echo set_value('numero_documento') ?>"/><br/><br/>

<label for="">Telefone:</label> <br/>
                        <input type="text" name="telefone" class="roundedInput requiredInput"
                               value="<?php echo set_value('telefone') ?>"/> <br/> <br>

                               <label for="">Celular:</label> <br/>
                        <input type="text" name="celular" class="roundedInput requiredInput"
                               value="<?php echo set_value('celular') ?>"/> <br/> <br>

                               <label for="">Operadora:</label> <br/>
                        <input type="text" name="operadora" class="roundedInput requiredInput"
                               value="<?php echo set_value('operadora') ?>"/> <br/> <br>

                        <label for="">E-Mail:</label> <br/>
                        <input type="text" name="email" class="roundedInput requiredInput"
                               value="<?php echo set_value('email') ?>"/> <br/> <br>

                        <?php echo form_close() ?>
                    </td>
                    <td>
                        <br/><br/><br/>

                        <div>
                            <?php echo img(
                                array(
                                    'src' => 'assets/img/img-usuario.png',
                                    'style' => 'display:block;margin-left:auto;margin-right:auto'
                                )
                            ) ?> <br/>
                        </div>
                        <br/><br/><br/><br/><br/><br/>

                        <div style="text-align: center">
                            <input type="image" style="vertical-align: middle"
                                   src="<?php echo base_url('assets/img/btn-cancelar.png') ?>"/>

                            <input type="image" style="vertical-align: middle" onclick="submitForm()"
                                   src="<?php echo base_url('assets/img/btn-salvar.png') ?>"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/cpf.js') ?>"></script>
<script type="text/javascript">
    function submitForm() {
        var input_documento = document.getElementById("numero_documento").value;
        var tipo_documento = document.getElementById('tipo_documento');

        if (tipo_documento.options[tipo_documento.selectedIndex].value == 'cpf') {
            if (!CPF.isValid(input_documento)) {
                alert("Por favor, digite um cpf válido");
                return false;
            }
        }
        else if (tipo_documento.options[tipo_documento.selectedIndex].value == 'cnpj') {
            if (!validarCNPJ(input_documento)) {
                alert("Por favor, digite um CNPJ válido");
                return false;
            }
        }
        else {
            alert("Por favor, selecione um tipo de documento.");
            return false;
        }

        document.forms[0].submit();
    }
</script>
