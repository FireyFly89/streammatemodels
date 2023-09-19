<section class="calculator">
    <div class="calculator__wrap" id="calculator">
        <h2><?php _e('ONTVANG EEN SCHATTING VAN UW POTENTIËLE WINST', 'streamatemodels'); ?></h2>
        <div class="calculator__result">
            <p>
                <?php _e('Vos gains estimés en tant que modèle Streamate pourraient être les suivants: '); ?>
                <span></span>
            </p>
        </div>
        <form class="calculator__form">
            <div class="form__item">
                <input type="text" name="age" id="age" placeholder="<?php _e('Uw leeftijd', 'streamatemodels'); ?>">
            </div>
            <div class="form__item">
                <select name="gender" id="gender">
                    <option value="0" disabled selected><?php _e('Uw geslacht', 'streamatemodels'); ?></option>
                    <option value="Femme"><?php _e('Vrouw', 'streamatemodels'); ?></option>
                    <option value="Homme"><?php _e('Man', 'streamatemodels'); ?></option>
                </select>
            </div>
            <div class="form__item">
                <input type="text" name="working_hours" id="working_hours"
                       placeholder="<?php _e('Werk uren per week', 'streamatemodels'); ?>">
            </div>
            <div class="form__submit">
                <button type="submit" class="btn"><?php _e('Berekenen', 'streamatemodels'); ?></button>
            </div>
        </form>
    </div>
</section>
