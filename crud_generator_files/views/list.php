<?php
/**
 * User: Mayck Xavier <mayckxavier@lab01.com.br>
 */
?>

<div id="workspace">
    <div class="workspace-title">
        <?php echo img('assets/img/workspace-img.png') ?>
    </div>

    <div class="workspace-usuarios">
        <div class="label_titulo">
            <?php echo img(array('src' => 'assets/img/title-clientes.png')) ?>
        </div>
        <div>
            <div style="clear: right;margin-top: 50px;">
                <?php if (count($clientes) > 0): ?>
                    <br/><br/>
                    <table class="tableDados">
                        <thead>
                        <tr>
                            <th style="width: 6%"></th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Telefone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td>
                                    <?php echo anchor("clientes/edit/{$cliente->id}",img(array('src' => 'assets/img/table-arrow.png', 'style' => 'margin-left:5px'))) ?>
                                    <?php echo anchor("clientes/delete/{$cliente->id}",img(array('src' => 'assets/img/btn-cancel.png', 'style' => 'margin-left:5px'))) ?>
                                </td>
                                <td><?php echo $cliente->nome ?></td>
                                <td><?php echo $cliente->email ?></td>
                                <td> <?php echo $cliente->telefone?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p style="width: 100%;text-align: right">Total de <?php echo count($clientes) ?> registro(s)
                        encontrado(s)</p>
                <?php elseif (isset($search_value) && count($clientes) == 0): ?>
                    <p>Nenhum resultado encontrado</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
