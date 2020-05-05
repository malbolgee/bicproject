<?php

    if (isset($_SESSION['result']))
    {

        if ($_SESSION['result']['programacao'] == "Férias Normais")
        {
            
            echo "<option value = 'Férias Normais'>Férias Normais</option>";
            echo "<option value = 'Antecipação de Férias'>Antecipação de Férias</option>";
            echo "<option value = 'Férias Não Programadas'>Férias Não Programadas</option>";

        }
        else if ($_SESSION['result']['programacao'] == "Antecipação de Férias")
        {

            echo "<option value = 'Antecipação de Férias'>Antecipação de Férias</option>";
            echo "<option value = 'Férias Normais'>Férias Normais</option>";
            echo "<option value = 'Férias Não Programadas'>Férias Não Programadas</option>";

        }
        else
        {
            echo "<option value = 'Férias Não Programadas'>Férias Não Programadas</option>";
            echo "<option value = 'Antecipação de Férias'>Antecipação de Férias</option>";
            echo "<option value = 'Férias Normais'>Férias Normais</option>";

        }

    }
    else
    {

        echo "<option value = 'Férias Normais'>Férias Normais</option>";
        echo "<option value = 'Antecipação de Férias'>Antecipação de Férias</option>";
        echo "<option value = 'Férias Não Programadas'>Férias Não Programadas</option>";

    }

?>