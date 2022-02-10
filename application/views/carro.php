<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <a href="<?php echo base_url() . 'home'; ?>">Voltar</a>
        <h1>Cadastro de Carro</h1>
        <?php echo form_open('carro/inserir'); ?>
            <input type="text" required placeholder="Marca..." name="marca"/>
            <br><br>
            <input type="text" required placeholder="Modelo..." name="modelo"/>
            <br><br>
            <input type="number" required placeholder="Qnt. de Portas..." name="portas"/>
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
            <input type="reset" value="Limpar" name="limpar">
        <?php echo form_close(); ?>
        <h2>Lista Carros</h2>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Placa</th>
                    <th>Proprietário</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $car): ?>
                <tr>
                    <td><?php echo $car->marca; ?></td>
                    <td><?php echo $car->modelo; ?></td>
                    <td><?php echo $car->cor; ?></td>
                    <td><?php echo $car->placa; ?></td>
                    <td>
                        <?php
                        foreach ($pessoas as $pes):
                            if ($pes->idPessoa == $car->idPessoa) {
                                echo $pes->nome;
                                break; // sair desta estrutura quando achar o valor correspondente
                            }
                        endforeach;
                        ?>
                    <td>
                        <a href="<?php echo base_url() .
                                'carro/editar/' . 
                                $car->idCarro; ?>" >Editar</a> | 
                        <a href="<?php echo base_url() .
                                'carro/excluir/' . 
                                $car->idCarro; ?>" >Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
