<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="<?php echo base_url() . 'pessoa'; ?>">Voltar</a>
        <h1>Editar Carro</h1>
        <?php echo form_open('carro/inserir'); ?>
            <input type="text" required placeholder="Marca..." name="marca"/>
            <br><br>
            <input type="text" required placeholder="Modelo..." name="modelo"/>
            <br><br>
            <input type="number" required placeholder="Qnt.Portas..." name="portas"/>
            <br><br>
            <input type="color" required placeholder="Cor..." name="cor"/>
            <br><br>
            <input type="text" required placeholder="Placa..." name="placa"/>
            <br><br>
            <select name ="idPessoa"> 
                <option value="">Proprietário</option> 
                <?php foreach ($pessoas as $pes): ?>
                <option value="<?php echo $pes->idPessoa;?>">
                    <?php echo $pes->nome;?> 
                </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <input type="submit" value="Salvar" name="salvar">
           <?php echo form_close(); ?>
    </body>
</html>
