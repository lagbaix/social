<?php

if (isset($erreurs) && count($erreurs) != 0)
            {
            echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>';

                foreach ($erreurs as $erreur) {
                    echo $erreur.'<br/>';
                }

            echo '</div>';

            } 