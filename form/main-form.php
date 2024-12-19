<?php
// Include the configuration file to establish the database connection
require '../data/db-config.php';
include '../security/CSRF-token.php';
// Include the data access file to fetch secretarias
include '../data/fetch-secretarias.php';
include '../data/fetch-direcoes.php';

// Fetch the secretarias options
$secretarias_options = fetchSecretarias($conn);
$direcao_options = fetchDirecao($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/form-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BCII Formulário</title>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center">BCII Requests</h2>
        <div class="wizard">
            <div class="wizard-step active">
                <div class="circle">1</div>
                <div class="label">Detalhes</div>
                <div class="connector"></div>
            </div>
            <div class="wizard-step">
                <div class="circle">2</div>
                <div class="label">Equipment</div>
                <div class="connector"></div>
            </div>
            <div class="wizard-step">
                <div class="circle">3</div>
                <div class="label">Revisão</div>
            </div>
        </div>
        <form action="" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="form-content">


                <div id="dados-gerais">
                    <h4 class="subtitle">Dados Pessoais</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name">Primeiro Nome</label>
                                <input type="text" class="form-control" id="first-name" placeholder="Digite o primeiro nome" required>
                                <span class="error-message" id="first-name-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last-name">Último Nome</label>
                                <input type="text" class="form-control" id="last-name" placeholder="Digite o último nome" required>
                                <span class="error-message" id="last-name-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Digite o e-mail" required>
                                <span class="error-message" id="email-error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="voip">VoIP</label>
                                <input type="number" class="form-control" id="voip" placeholder="Digite o número VoIP" required>
                                <span class="error-message" id="voip-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direcao">Direção</label>
                        <select class="form-control" name="direcao[]" id="direcao"  required>
                            <option value="" class="default">Escolha a sua Direção</option>
                            <?php echo $direcao_options; ?>
                        </select>
                        <span class="error-message" id="direcao-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="secretaria">Secretária</label>
                        <select class="form-control" name="secretaria[]" id="secretaria" placeholder="Escolha a sua Secretaria" required>
                            <option value="" class="default">Escolha a sua Secretaria</option>
                            <?php echo $secretarias_options; ?>
                        </select>
                        <span class="error-message" id="secretaria-error"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="request-date">Data do Pedido</label>
                                <input type="date" class="form-control" id="request-date" required placeholder="Data do Pedido">
                                <span class="error-message" id="request-date-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary botao" id="proximo-equipamentos">Próximo</button>
                        </div>
                    </div>
                </div>


                <div id="equipamentos" style="display: none">
                    <h4 class="subtitle">Equipamento a Pedir</h4>
                    <div id="items-container">
                        <div class="form-row" id="item-row">
                            <div class="form-group item-codigo">
                                <label for="item-code">Código Bem</label>
                                <input type="number" class="form-control" id="item-code" placeholder="#Num" required />
                                <span class="error-message" id="item-code-error"></span>
                            </div>
                            <div class="form-group equip-name">
                                <label for="item-name">Nome do Item</label>
                                <input type="text" class="form-control" id="item-name" placeholder="Digite o nome do item" required />
                                <span class="error-message" id="item-name-error"></span>
                            </div>
                            <div class="form-group quantity-group">
                                <label for="quantity">Quantidade</label>
                                <input type="text" class="form-control" id="quantity" placeholder="Qty" required />
                                <span class="error-message" id="quantity-error"></span>
                                <input type="hidden" id="hiddenStock" name="hiddenStock" value="" />
                            </div>
                            							<!-- Clean field button to clear the row fields -->
							<button type="button" class="clean-btn" id="icon">
								<i class="fa">&#xf021;</i>
							</button>

							<!-- Trash icon button to delete the row -->
							<button type="button" class="delete-btn" id="icon">
								<i class="fa fa-trash"></i>
							</button>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <img src="../assets/images/icn-plus-circle.svg" data-cmp-info="10" id="add-new-item" style="width: 30px;cursor: pointer;">
                        <span class="add-item-text">Add Item</span>
                    </div>
                    <div class="form-group justificacao">
                        <label for="destino">Local de Destino</label>
                        <select name="destino[]" class="form-control" id="destino" required>
                            <option value="">Escolha um destino</option>
                            <?php echo $direcao_options; ?>
                        </select>
                        <span class="error-message" id="destino-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="justification">Justificação</label>
                        <textarea id="justification" class="form-control" rows="4" placeholder="Please insert why you need this equipment" required></textarea>  
                        <span class="error-message" id="justification-error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="gap: 10px;">
                        <button type="button" class="btn btn-primary botao" id="anterior-dados-gerais" style="background-color: #6c757d;">Anterior</button>
                        <button type="button" class="btn btn-primary botao" id="proximo-revisao" style="background-color: #00AA6D;">Próximo</button>
                        </div>
                    </div>
                </div>


                <div id="revisao" style="display: none">
					<h4 class="subtitle">Revisão</h4>

                    <div class="form-row" id="button-row">
						<button type="button" class="submit-btn anterior" id="anterior-equipamentos" style="background-color: #6c757d;">Anterior</button>
						<button type="button" class="submit-btn proximo" id="post" style="background-color: #00AA6D;">Submeter</button>
					</div>
                </div>





            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/manipulate-form.js"></script>
</body>
</html>
