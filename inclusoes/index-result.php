
                <div id = 'success-div' class="container has-text-centered">
                    <!-- Começo da primeira heading -->
                    <div class="notification is-warning">

                        <nav class="level">
                            <div class="level-item has-text-centered">

                                <div>
                                    <p class="heading">Nome</p>
                                    <p class="title"><?php echo $_SESSION['result']['nome']; ?></p>                                
                                </div>
                            </div>

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Período Aquisitivo</p>
                                    <p class="title">
                                        <?php echo date("d/m/Y", strtotime($_SESSION['result']['inicio_periodo'])); ?> a 
                                        <?php echo date("d/m/Y", strtotime($_SESSION['result']['fim_periodo'])); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Direito a Férias</p>
                                    <p class="title">
                                        <?php 
                                            $value = $_SESSION['result']['direito_ferias'];
                                            if ($value != 1)
                                                echo $value . " Dias";
                                            else
                                                echo $value . " Dia";
                                        ?>
                                    </p>                                
                                </div>
                            </div>

                        </nav>
                        <!-- Fim da primeira heading -->
                    </div>
                    <!-- Início da Segunda heading -->
                    <div class="notification is-warning">

                        <nav class="level">

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Tipo de Férias</p>
                                    <p class="title"><?php echo $_SESSION['result']['programacao']; ?></p>
                                
                                </div>
                            </div>

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Período de Férias</p>
                                    <p class="title">
                                        <?php echo date("d/m/Y", strtotime($_SESSION['result']['inicio_ferias'])); ?> a 
                                        <?php echo date("d/m/Y", strtotime($_SESSION['result']['fim_ferias'])); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Dias de Férias</p>
                                    <p class="title">
                                        <?php 

                                            $value = $_SESSION['result']['ferias'];
                                            if ($value != 1)
                                                echo $value . " Dias";
                                            else
                                                echo $value . " Dia";
                                                
                                        ?>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Dias Antecipados</p>
                                    <p class="title">
                                        <?php 
                                                $result = $_SESSION['result']['ferias'] - $_SESSION['result']['direito_ferias'];
                                                if ($result > 0)
                                                    if ($result != 1)
                                                        echo $result . " Dias";
                                                    else
                                                        echo $result . " Dia";
                                                else
                                                    echo "0 Dias";
                                        ?>
                                    </p>
                                </div>
                            </div>

                        </nav>
                        <!-- Fim da segunda heading -->
                    </div>
                    <!-- Começo da terceira heading -->
                    <div class="notification is-warning">

                        <nav class="level">

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Data de Pagamento</p>
                                    <p class="title"><?php echo date("d/m/Y", strtotime($_SESSION['result']['pagamento'])); ?></p>
                                </div>
                            </div>

                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Retorno ao Trabalho</p>
                                    <p class="title"><?php echo date("d/m/Y", strtotime($_SESSION['result']['retorno_ferias'])); ?></p>
                                </div>
                            </div>

                        </nav>

                    </div>
                    <!-- Fim da terceira heading -->
                </div>