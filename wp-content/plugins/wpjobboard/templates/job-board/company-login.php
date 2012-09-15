
<div id="wpjb-main" class="wpjb-page-company-login">

    <?php wpjb_flash() ?>

    <form class="wpjb-form" action="" method="post">
        <fieldset>
        <?php wpjb_form_render_hidden($form) ?>
        <?php foreach($form->getNonEmptyGroups() as $group): ?>
        <?php /* @var $group stdClass */ ?> 

            <?php foreach($group->element as $name => $field): ?>
            <?php /* @var $field Daq_Form_Element */ ?>
            <div class="<?php wpjb_form_input_features($field) ?>">

                <label class="wpjb-label">
                    <?php esc_html_e($field->getLabel()) ?>
                    <?php if($field->isRequired()): ?><span class="wpjb-required">*</span><?php endif; ?>
                </label>
                
                <div class="wpjb-field">
                    <?php wpjb_form_render_input($form, $field) ?>
                    <?php wpjb_form_input_hint($field) ?>
                    <?php wpjb_form_input_errors($field) ?>
                </div>

            </div>
            <?php endforeach; ?>

        <?php endforeach; ?>


            <div>
                <label class="wpjb-label">&nbsp;</label>
                <input type="submit" name="wpjb_login" id="wpjb_submit" value="<?php _e("Login", WPJB_DOMAIN) ?>" />
                <a href="<?php echo wpjb_link_to("employer_new") ?>"><?php _e("Not a member? Register", WPJB_DOMAIN) ?></a>
            </div>
        </fieldset>


    </form>


</div>
