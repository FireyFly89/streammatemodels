<section class="calculator">
    <div class="calculator__wrap" id="calculator">
        <h2><?php _e('​RECEVEZ UNE ESTIMATION DE VOS GAINS POTENTIELS', 'streamatemodels'); ?></h2>
        <div class="calculator__result">
            <p>
                <?php _e('Vos gains estimés en tant que modèle Streamate pourraient être les suivants: '); ?>
                <span></span>
            </p>
        </div>
        <form class="calculator__form">
            <div class="form__item">
                <input type="text" name="age" id="age" placeholder="<?php _e('Votre âge', 'streamatemodels'); ?>">
            </div>
            <div class="form__item">
                <select name="gender" id="gender">
                    <option value="0" disabled selected><?php _e('Votre sexe', 'streamatemodels'); ?></option>
                    <option value="Femme"><?php _e('Femme', 'streamatemodels'); ?></option>
                    <option value="Homme"><?php _e('Homme', 'streamatemodels'); ?></option>
                </select>
            </div>
            <div class="form__item">
                <input type="text" name="working_hours" id="working_hours"
                       placeholder="<?php _e('Heures de travail par semaine', 'streamatemodels'); ?>">
            </div>
            <div class="form__submit">
                <button type="submit" class="btn"><?php _e('Calculer', 'streamatemodels'); ?></button>
            </div>
        </form>
    </div>
</section>
