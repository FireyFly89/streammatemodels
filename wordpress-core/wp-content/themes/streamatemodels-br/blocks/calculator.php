<section class="calculator">
    <div class="calculator__wrap" id="calculator">
        <h2><?php _e('RECEBA UMA ESTIMATIVA DOS SEUS GANHOS POTENCIAIS', 'streamatemodels'); ?></h2>
        <div class="calculator__result">
            <p>
                <?php _e('Seus ganhos estimados como uma modelo Streamate podem ser os seguintes: '); ?>
                <span></span>
            </p>
        </div>
        <form class="calculator__form">
            <div class="form__item">
                <input type="text" name="age" id="age" placeholder="<?php _e('Sua idade', 'streamatemodels'); ?>">
            </div>
            <div class="form__item">
                <select name="gender" id="gender">
                    <option value="0" disabled selected><?php _e('Seu sexo', 'streamatemodels'); ?></option>
                    <option value="Femme"><?php _e('Feminimo', 'streamatemodels'); ?></option>
                    <option value="Homme"><?php _e('Masculino', 'streamatemodels'); ?></option>
                </select>
            </div>
            <div class="form__item">
                <input type="text" name="working_hours" id="working_hours"
                       placeholder="<?php _e('Horas de trabalho por semana', 'streamatemodels'); ?>">
            </div>
            <div class="form__submit">
                <button type="submit" class="btn"><?php _e('Calcular', 'streamatemodels'); ?></button>
            </div>
        </form>
    </div>
</section>
