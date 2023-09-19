<section class="calculator">
    <div class="calculator__wrap" id="calculator">
        <h2><?php _e('Ottenere una previsione dei vostri potenziali guadagni', 'streamatemodels'); ?></h2>
        <div class="calculator__result">
            <p>
                <?php _e('Le tue entrate stimate come modello Streamate potrebbero essere le seguenti: '); ?>
                <span></span>
            </p>
        </div>
        <form class="calculator__form">
            <div class="form__item">
                <input type="text" name="age" id="age" placeholder="<?php _e('La tua età', 'streamatemodels'); ?>">
            </div>
            <div class="form__item">
                <select name="gender" id="gender">
                    <option value="0" disabled selected><?php _e('Il tuo genere', 'streamatemodels'); ?></option>
                    <option value="Femme"><?php _e('Donna', 'streamatemodels'); ?></option>
                    <option value="Homme"><?php _e('Uomo', 'streamatemodels'); ?></option>
                </select>
            </div>
            <div class="form__item">
                <input type="text" name="working_hours" id="working_hours"
                       placeholder="<?php _e('Ore di lavoro settimanali', 'streamatemodels'); ?>">
            </div>
            <div class="form__submit">
                <button type="submit" class="btn"><?php _e('Calcolare', 'streamatemodels'); ?></button>
            </div>
        </form>
    </div>
</section>
